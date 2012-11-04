<?php
/*
*Fonction gérant plusieurs SGBD pour se connecter à une base de données
*
*@param string $database Tableau des paramètres de connection
*$database = array(
*	'host' => 'localhost',
*	'name' => 'pdo',
*	'user' => 'root',
*	'password' => '',
*	'driver' => 'mysql'
*);
*@return ressource $link Ressource de la connection
*/
function connect_db($database){

	//Si aucun driver n'est passé en paramètre, on utilise MySQL par défault
	if(!isset($database['driver']) || empty($database['driver'])){$database['driver'] = 'mysql';}

	switch ($database['driver']){

		case 'mysql':
			$source = 'mysql:host='.$database['host'].';dbname='.$database['name'];
			$utilisateur = $database['user'];
			$mot_de_passe = $database['password'];
			break;
		case 'oracle':
			$source = 'oci:dbname='.$database['name'];
			$utilisateur = $database['user'];
			$mot_de_passe = $database['password'];
			break;
		case 'sqlite':
			$source = $database['name'];
			$utilisateur = $database['user'];
			$mot_de_passe = $database['password'];
			break;
	}

	//Toutes les opérations sont éffectuées dans un bloc 'Try'
	//afin de récupérer les exceptions levées par PDO
	try{

		//Connexion à la base de données
		$link = new PDO($source, $utilisateur, $mot_de_passe);

		//Modification des paramètres de la connexion pour
		//demander que les exceptions soient levées en cas d'erreurs
		$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//Modification de l'encodage de la connexion
		$link->exec("SET CHARACTER SET utf8");

		return $link;

	}catch(PDOException $e){

		//On gère les exceptions.
		echo 'Error!: ',$e->getMessage(),'<br />';
		die();

	}

}


/**
*Cette fonction permet de renvoyer les colonnes de la table passée en paramètre.
*
*@param varchar $table Nom de la table
*@param ressource $link Lien vers la ressource de connection au serveur
*@return array Tableau contenant la liste des colonnes de la table
*/
function schema_column($table,$link){
	
	$sql_schema = "SHOW COLUMNS FROM ".$table;
	
	$preparedQuerySelect = $link->prepare($sql_schema);
	
	$preparedQuerySelect->execute();

	$schema = array();
	
	//On parcour le tableau renvoyer par PDO
	//afin de garder et stocker dans un tableau uniquement
	//les noms des colonnes
	foreach($preparedQuerySelect->fetchAll(PDO::FETCH_ASSOC) as $v){
	
			$schema[] = $v['Field'];	
	}
	
	//On retourne le tableau contenant les colonnes
	return $schema;
}

/**
*Cette fonction permet de récupérer des informations d'une base de donnèes.
*
*@param array $parametres Tableau des paramètres de la requête
*@return array Tableau contenant les résultats de la requête
*/
function find($parametres) {
	
	$table = $parametres['table'];
	$link = $parametres['link'];	
	$tableau = array();
	$sql = "SELECT ";
		
	if(isset($parametres['fields'])){
	
		//Si il s'agit d'un tableau
		if(is_array($parametres['fields'])){ $sql .= implode(', ', $parametres['fields']); }
		
		//Si il s'agit d'une chaine de caractères
		else{ $sql .= $parametres['fields']; }
		
	}else{ $sql .= '*'; }
	
	$sql .= " FROM ".$table;

	if(isset($parametres['conditions'])){ //Si on a des conditions
		
		//On teste si conditions est un tableau
		//Sinon on est dans le cas d'une requete personnalisée
		if(!is_array($parametres['conditions'])){
	
			$sql .= ' WHERE '.$parametres['conditions']; //On les ajoute à la requete
	
		//Si c'est un tableau on va rajouter les valeurs
		}else{
	
			$cond = array();
			foreach($parametres['conditions'] as $k => $v){
	
				if(!is_numeric($v)) {
	
					$v = "'".mysql_real_escape_string($v, $link)."'";
				}
				$cond[] = "$k=$v";
			}
			
			//On test si il y a des conditions
			if(count($cond) > 0){
				
				$sql .= ' WHERE '.implode(' AND ', $cond);

			}
		}
	}
	
	$sql .= " ORDER BY id DESC";
	
	if(isset($parametres['limite'])){
	
		$start = $parametres['limite']['start'];
		$limit = $parametres['limite']['limit'];
		$sql .= " LIMIT $start, $limit";
	}
	
	//On prépare la requête de selection
	$preparedQuerySelect = $link->prepare($sql);
		
	//Exécution de la requête
	$preparedQuerySelect->execute();
		
	//On retourne le résultat
	return $preparedQuerySelect->fetchAll(PDO::FETCH_ASSOC);

}

function findFirst($parametres){

	return current(find($parametres));
}

function findList($parametres){
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v){ $tableau[$v['id']] = $v['name']; }
	return $tableau;	
}

function findSex($parametres){
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v){ $tableau[$v['id']] = $v['sexe']; }
	return $tableau;	
}

function findAuthor($parametres){
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v){ $tableau[$v['id']] = $v['prenom']; }
	return $tableau;	
}

function findArticle($parametres){
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v){ $tableau[$v['id']] = $v['titre']; }
	return $tableau;	
}

function findRole($parametres){
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v){ $tableau[$v['id']] = $v['name']; }
	return $tableau;	
}

/**
*Cette fonction permet l'insertion et l'update d'une base de données.
*
*@param array $parametres Tableau des paramètres de la requête
*@param array $data Tableau des valeurs à utiliser pour la requête
*@return integer Id de la dernières requête affectée
*/
function save($parametres, $data){

	foreach($data as $key => $value){
	
		//On test si la valeur n'est pas numérique
		if(!is_numeric($value)){
		
			//Si oui, on échappe les éventuelles apostrophes
			$data[$key] = substr($parametres['link']->quote($value), 1, -1);
		}
	}
	
	//On récupère un tableau contenant la liste des colonnes de la table
	$schema = schema_column($parametres['table'],$parametres['link']); 
	
		//On teste l'éxistence de la colonne modified
		if(in_array("modified", $schema)){
			//On ajoute l'index Modified et sa valeur au tableau Data
			$data['modified'] = date('Y-m-d H:i:s'); 
		}
			
		//On teste l'éxistence de la colonne modified_by
		if(in_array("modified_by", $schema)){
			//On ajoute l'index Modified_by et sa valeur au tableau Data
			$data['modified_by'] = $_SESSION['user_id'];
		}
	
	if(isset($data['id']) && !empty($data['id'])){
		
		$sql = "UPDATE ".$parametres['table']." SET ";
		foreach($data as $k=>$v) {
			
			if($k!="id") { 
				$sql .= "$k='$v',"; 
			}
			
		}
		
		//Suppression de la dernière virgule
		$sql = substr($sql,0,-1);
		$sql .=" WHERE id=".$data['id']; 
		
	}else{
		
		//On teste l'éxistence de la colonne created
		if(in_array("created", $schema)) {
			//On ajoute l'index Created et sa valeur au tableau Data
			$data['created'] = date('Y-m-d H:i:s'); 
		}
		
		//On teste l'éxistence de la colonne created_by
		if(in_array("created_by", $schema)) {
			//On ajoute l'index Created_by et sa valeur au tableau Data
			$data['created_by'] = $_SESSION['user_id'];
		}
		
		$sql = "INSERT INTO ".$parametres['table']."(";
		unset($data["id"]);
		
		foreach($data as $k=>$v){$sql .= "$k,";}

		//Suppression de la dernière virgule
		$sql = substr($sql,0,-1);
		$sql .=') VALUES(';
		
		foreach($data as $v){$sql .= "'$v',";}
		
		//Suppression de la dernière virgule
		$sql = substr($sql,0,-1);
		$sql .=")";
	}
	
	$sql .= ';';
	
	//On prépare la requête d'insertion
	$preparedQueryInsert = $parametres['link']->prepare($sql);
	
	$preparedQueryInsert->execute();
	
	//Si on est dans le cas d'une insertion
	if(!isset($data['id'])){ 
		
		//On retourne l'Id de la dernières requête affectée
		return $parametres['link']->lastInsertId(); 
	} 
	//Sinon c'est qu'on effectu un update
	else{ 
	
		//On renvoi l'id passé dans le tableau $data
		return $data["id"]; 
	}	
}

/**
*Cette fonction permet de supprimer un élément d'une base de données.
*
*@param array $parametres Tableau des paramètres de la requête
*/
function delete($parametres){

		$sql = "DELETE FROM ".$parametres['table']." WHERE id=".$parametres['id'];
		
		//On prépare la requête de suppression
		$preparedQueryDelete = $parametres['link']->prepare($sql);
		
		//Exécution de la requête
		$preparedQueryDelete->execute();
}

/**
*Cette fonction permet de supprimer un élément d'une base de données par rapport à un nom.
*
*@param array $parametres Tableau des paramètres de la requête
*/
function delete_by_name($parametres){

		$sql = "DELETE FROM ".$parametres['table']." WHERE ".$parametres['name']."=".$parametres['value'];
		
		//On prépare la requête de suppression
		$preparedQueryDelete = $parametres['link']->prepare($sql);
		
		//Exécution de la requête
		$preparedQueryDelete->execute();
}

/**
*Cette fonction permet de gérer la validation d'un formulaire.
*
*@param array $validate Tableau des paramètres de la validation
*@param array $data Tableau des valeurs à utiliser pour la validation
*@return array Tableau des erreurs
*/
function validates($validate, $datas){

	//On inclu la fonction de validation
	require(LIB.DS.'validation.php');
	
	//On créer le tableau des erreurs
	$errors = array();
	
	//On parcours tous les champs à valider
	foreach($validate as $key => $value){
		if(isset($_POST[$key])){
		
			//On test si l'on a qu'une seule règle de validation
			if(isset($value['rule'])){
			
				//On test si la fonction de validation renvoi faux
				if(!Validation::check($_POST[$key],$value['rule'])){
				
					//On ajoute l'erreur au tableau
					$errors[$key]= $value['message'];
				}
				
			//Sinon on a plusieurs règles
			}else{
				foreach($value as $key2 => $value2){
				
					//On test si la fonction de validation renvoi faux
					if(!Validation::check($_POST[$key],$value2['rule'])){
					
						//On ajoute l'erreur au tableau
						$errors[$key]= $value2['message'];
					}
				}	
			}
		}
	}
	
	//On retourne le tableau contenant les erreurs
	return $errors;
}	

/**
*Cette fonction permet de compter le nombre d'éléments que renvoi l'instruction sql SELECT.
*
*@param varchar $table Variable contenant le nom de la table
*@author Holic
*/
function count_elem($table){

	$request = 'SELECT * FROM '.$table; 
	$result = mysql_query($request) or die('Erreur de base de données.');
	$num = mysql_num_rows($result);

	return $num;
}


/**
*Cette fonction permet de générer une pagination.
*
*@param object $link Ressource de la connection
*@param varchar $table Variable contenant le nom de la table
*@param integer $limit Variable contenant le nombre d'éléments à afficher par page
*@param varchar $condition Conditions, aucunes par défault
*/
function pagination($link, $table, $limit, $condition=null){

	//Nombre de pages adjacentes
	$adjacents = 2;
	
	//On récupère en premier le nombre de lignes présentes dans la table
	if(isset($condition) && !empty($condition)){
	
		$total_pages = find(array('table' => $table, 'conditions' => $condition,'link' => $link));
	}else{
	
		$total_pages = find(array('table' => $table,'link' => $link));
	}
	
	//On compte le nombre de ligne
	$total_pages = count($total_pages);
	
	//Nom de la page présente dans les urls
	$targetPage = "";
	
	//On récupère le numéro de la page dans l'url, si il n'y en à pas, la page par défault sera 1
	if(isset($_GET['page']) && !empty($_GET['page'])){ 
		$page = $_GET['page'];
	 }else{$page = 1;}
	 
	$start = ($page - 1) * $limit;
	$prev = $page - 1;							
	$next = $page + 1;							
	$lastPage = ceil($total_pages/$limit);
	$lpm1 = $lastPage - 1;
	$pagination = "";
	
	if($lastPage > 1){
	
		$pagination .= "<div class=\"pagination\">";

		if($page > 1){$pagination.= "<a href=\"$targetPage?page=$prev\">« précédent</a>";}
		else{$pagination.= "<span class=\"disabled\">« précédent</span>";}	
		
		if($lastPage < 7 + ($adjacents * 2)){	
		
			for($counter = 1; $counter <= $lastPage; $counter++){
			
				if($counter == $page){$pagination.= "<span class=\"current\">$counter</span>";}
				else{$pagination.= "<a href=\"$targetPage?page=$counter\">$counter</a>";}						
			}
		}else if($lastPage > 5 + ($adjacents * 2)){
		
			if($page < 1 + ($adjacents * 2)){
			
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
				
					if ($counter == $page){$pagination.= "<span class=\"current\">$counter</span>";}
					else{$pagination.= "<a href=\"$targetPage?page=$counter\">$counter</a>";}										
				}
				
				$pagination.= "...";
				$pagination.= "<a href=\"$targetPage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetPage?page=$lastPage\">$lastPage</a>";		
			}

			else if($lastPage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
			
				$pagination.= "<a href=\"$targetPage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetPage?page=2\">2</a>";
				$pagination.= "...";
				
				for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++){
				
					if($counter == $page){$pagination.= "<span class=\"current\">$counter</span>";}		
					else{$pagination.= "<a href=\"$targetPage?page=$counter\">$counter</a>";}							
				}
				
				$pagination.= "...";
				$pagination.= "<a href=\"$targetPage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetPage?page=$lastPage\">$lastPage</a>";		
			}

			else{
			
				$pagination.= "<a href=\"$targetPage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetPage?page=2\">2</a>";
				$pagination.= "...";
				for($counter = $lastPage - (2 + ($adjacents * 2)); $counter <= $lastPage; $counter++){
				
					if($counter == $page){$pagination.= "<span class=\"current\">$counter</span>";}	
					else{$pagination.= "<a href=\"$targetPage?page=$counter\">$counter</a>";}
											
				}
			}
		}
		
		if($page < $counter - 1){$pagination.= "<a href=\"$targetPage?page=$next\">suivant »</a>";}
		else{$pagination.= "<span class=\"disabled\">suivant »</span>";}
			
		$pagination.= "</div>\n";		
	}
	
	return $pagination;
	
}

//Par défaut on se connecte à la base de données
$link = connect_db($database);