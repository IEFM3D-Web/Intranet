<?php
$serveurHost = 'localhost';
$bddLogin = 'root';
$bddPass = '';
$bddName = 'intranet';


/**
 * Fonction de connexion à la base de données
 * 
 * @param 	varchar		$serveur	Nom du serveur
 * @param 	varchar		$login		Identifiant de connexion au serveur
 * @param 	varchar		$password	Mot de passe de connexion au serveur
 * @param 	varchar		$dbName		Base de données à utiliser
 * @return 	ressource	$link		Ressource de connexion au serveur
 */
function connect($serveur, $login, $password, $dbName){
	
	$connector = mysql_connect($serveur, $login, $password) or die ('Impossible de se connecter au serveur'); 
	mysql_select_db($dbName, $connector) or die ('Impossible de selectionner la base de donnée');
	return $connector;
}


/**
*Cette fonction permet de renvoyer les colonnes de la table passée en paramètre.
*
*@param varchar $table Variable contenant le nom de la base de donnée.
*@param ressource $link Lien vers la ressource de connection au serveur.
*@return array Tableau contenant la liste des colonnes de la table.
*@author Holic
*/
function schema_column($table,$link){
	
	$aResult_schema = array(); //Déclaration d'une variable de type tableau qui contiendra la liste des tables.
	
	$sql_schema = "SHOW COLUMNS FROM ".$table;
	if($sql_result_schema = mysql_query($sql_schema,$link)){
		
		//Parcours des résultats.
		while($sql_ligne_schema = mysql_fetch_row($sql_result_schema)) {
			$aResult_schema[] = $sql_ligne_schema[0]; //Affectation du tableaux.
		}
	}
	return $aResult_schema; //On retourne le résultat.
}


function find($parametres) {
	
	$table = $parametres['table'];
	$link = $parametres['link'];	

	$tableau = array();
	$sql = "SELECT ";
		
	///////////////////////
	//   CHAMPS FIELDS   //
	if(isset($parametres['fields'])) {
	
		//Si il s'agit d'un tableau
		if(is_array($parametres['fields'])) { $sql .= implode(', ', $parametres['fields']); }
		//Si il s'agit d'une chaine de caractères
		else { $sql .= $parametres['fields']; }
	} else { $sql .= '*'; }
	
	$sql .= " FROM ".$table;

		
	if(isset($parametres['conditions'])) { //Si on a des conditions
		
		//On teste si conditions est un tableau
		//Sinon on est dans le cas d'une requete personnalisée
		if(!is_array($parametres['conditions'])) {
	
			$sql .= ' WHERE '.$parametres['conditions']; //On les ajoute à la requete
	
		//Si c'est un tableau on va rajouter les valeurs
		} else {
	
			$cond = array();
			foreach($parametres['conditions'] as $k => $v) {
	
				if(!is_numeric($v)) {
	
					$v = "'".mysql_real_escape_string($v, $link)."'";
				}
				$cond[] = "$k=$v";
			}
			
			//if(!empty($cond)) {
			if(count($cond) > 0) {
				
				$sql .= ' WHERE '.implode(' AND ', $cond);

			}
		}
	}
	
	$sql .= " ORDER BY id DESC";
	
	if(isset($parametres['limite'])) {
	
		$start = $parametres['limite']['start'];
		$limit = $parametres['limite']['limit'];
		$sql .= " LIMIT $start, $limit";
	}
	
	if($result = mysql_query($sql, $link)) { //On lance la requête
		
		//Parcours des résultats et affectation du tableau
		while($ligne = mysql_fetch_assoc($result)) { $tableau[] = $ligne; }
	}
	return $tableau; //On retourne le résultat
}

function findFirst($parametres) {

	return current(find($parametres));
}

function findList($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['name']; }
	return $tableau;	
}

function findSex($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['sexe']; }
	return $tableau;	
}

function findAuthor($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['prenom']; }
	return $tableau;	
}

function findArticle($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['titre']; }
	return $tableau;	
}

function findRole($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['name']; }
	return $tableau;	
}

function save($parametres, $data){

	$schema = schema_column($parametres['table'],$parametres['link']); //On appel la fonction schema_column retournant un tableau contenant le nom des colonnes existantes dans la table
	
	if(in_array("modified", $schema)) { //On teste l'éxistence de la colonne modified
		$data['modified'] = date('Y-m-d H:i:s'); //On ajoute l'index Modified et sa valeur au tableau Data
	}
		
	if(in_array("modified_by", $schema)) { //On teste l'éxistence de la colonne modified_by
		$data['modified_by'] = $_SESSION['user_id']; //On ajoute l'index Modified_by et sa valeur au tableau Data
	}
		
	if(isset($data['id']) && !empty($data['id'])) {
		
		$sql = "UPDATE ".$parametres['table']." SET ";
		foreach($data as $k=>$v) {
			
			if($k!="id") { 
				$v = mysql_real_escape_string($v, $parametres['link']);
				$sql .= "$k='$v',"; }
		}
		$sql = substr($sql,0,-1); //Je supprime la derniere virgule 
		$sql .=" WHERE id=".$data['id']; 
	}
	else {
	
		if(in_array("created", $schema)) { //On teste l'éxistence de la colonne created
			$data['created'] = date('Y-m-d H:i:s'); //On ajoute l'index Created et sa valeur au tableau Data
		}
		
		if(in_array("created_by", $schema)) { //On teste l'éxistence de la colonne created_by
			$data['created_by'] = $_SESSION['user_id']; //On ajoute l'index Created_by et sa valeur au tableau Data
		}
		
	
		$sql = "INSERT INTO ".$parametres['table']."(";
		unset($data["id"]);
		foreach($data as $k=>$v) { $sql .= "$k,"; }
	
		$sql = substr($sql,0,-1);   // je supprime la derniere virgule 
		$sql .=') VALUES(';
		
		foreach($data as $v) { 
		$v = mysql_real_escape_string($v, $parametres['link']);
		$sql .= "'$v',"; }
		$sql = substr($sql,0,-1);
		$sql .=")";
	}
	$sql .= ';';
	//echo $sql;
	mysql_query($sql) or die(mysql_error()."</br>=>".mysql_query());
	if(!isset($data['id'])) { return mysql_insert_id(); } 
	else { return $data["id"]; }	
}


function delete($parametres){
		$sql = "DELETE FROM ".$parametres['table']." WHERE id=".$parametres['id'];
	mysql_query($sql, $parametres['link']) or die(mysql_error()."</br>=>".mysql_query());	
}


function delete_by_name($parametres){
		$sql = "DELETE FROM ".$parametres['table']." WHERE ".$parametres['name']."=".$parametres['value'];
	mysql_query($sql, $parametres['link']) or die(mysql_error()."</br>=>".mysql_query());	
}


function validates($validate, $datas){

	require(LIB.DS.'validation.php'); //On inclu la fonction de validation
	$errors = array();
	foreach($validate as $key => $value){ //On parcours tous les champs à valider
		if(isset($_POST[$key])){
			if(isset($value['rule'])){ //On test si l'on a qu'une seule règle de validation
				if(!Validation::check($_POST[$key],$value['rule'])){ //On test si la fonction de validation renvoi faux
						$errors[$key]= $value['message'];
					}
			} else { //Sinon on a plusieurs règles
				foreach($value as $key2 => $value2){
					if(!Validation::check($_POST[$key],$value2['rule'])){ //On test si la fonction de validation renvoi faux
						$errors[$key]= $value2['message'];
					}
				}	
			}
		}
	}
	return $errors;
}	


/**
*Cette fonction permet de compter le nombre de d'élément que renvoi l'instruction sql SELECT.
*
*@param varchar $table Variable contenant le nom de la table
*@author Holic
*/
function count_elem($table){

	$request = 'SELECT * FROM '.$table; 
	$result = mysql_query($request) or die('Erreur de base de données.');
	$num = mysql_num_rows($result);

	return $num; //On retourne le résultat
}


/**
*Cette fonction permet de générer une pagination.
*
*@param varchar $table Variable contenant le nom de la table
*@param int $limit Variable contenant le nombre d'éléments à afficher par page
*@author Holic
*/
function pagination($table, $limit, $condition=null){

	$tbl_name=$table;

	$adjacents = 2; //Nombre de pages adjacentes
	
	//On récupère en premier le nombre de lignes présentes dans la table
	if(isset($condition) && !empty($condition)){$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE $condition";}
	else{$query = "SELECT COUNT(*) as num FROM $tbl_name";}
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	$targetpage = ""; //Nom de la page présente dans les urls

	if(isset($_GET['page']) && !empty($_GET['page'])){ //On récupère le numéro de la page dans l'url, si il n'y en à pas, la page par défault sera 1
		$page = $_GET['page'];
	 }else{$page = 1;}
	 
	$start = ($page - 1) * $limit;

	$prev = $page - 1;							
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;
	
	$pagination = "";
	if($lastpage > 1)
	{	 
		$pagination .= "<div class=\"pagination\">";

		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« précédent</a>";
		else
			$pagination.= "<span class=\"disabled\">« précédent</span>";	
		
		if ($lastpage < 7 + ($adjacents * 2))
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}

			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">suivant »</a>";
		else
			$pagination.= "<span class=\"disabled\">suivant »</span>";
		$pagination.= "</div>\n";		
	}
	
	return $pagination;
	
}


$link = connect($serveurHost, $bddLogin, $bddPass, $bddName); //Par défaut on se connecte à la base de données