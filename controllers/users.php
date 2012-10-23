<?php
//On inclu les fonctions annexes
require(CONTROLLERS.DS.'controller.php');



/**
*Cette fonction gère la connexion des utilisateurs
*Si une correspondance mail/mot de passe est trouvée dans la base de données, 
* une session est créée et on fait une redirection vers l'accueil
*/
function index() {
	
	global $link;
	if(isset($_POST) && !empty($_POST)){
	
		$postLogin = $_POST['mail'];
		$postPass =  sha1($_POST['password']);
	
		if(!empty($postLogin) && !empty($postPass)){
		
			if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['mail'])){
			
				$user = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => "mail='".$postLogin."'"));
				
				if(!empty($user)){		

					$bddId = $user['id'];
					$bddNom = $user['nom'];
					$bddPrenom = $user['prenom'];
					$bddLogin = $user['mail'];
					$bddRole = $user['role'];
					$bddPass = $user['password'];
					$bddIs_auth = $user['is_auth'];
					$bddFolder = $user['folder'];
					
					if($postPass == $bddPass){
						
						if($bddIs_auth){
							
							session_name("IEFM3D");
							session_start(); //On démarre une variable de session
							$_SESSION['isAuth']= true;
							$_SESSION['user_id']= $bddId;
							$_SESSION['nom']= $bddNom;
							$_SESSION['role']= $bddRole;
							$_SESSION['prenom']= $bddPrenom;
							$_SESSION['folder'] = $bddFolder;
							
							//On récupère les informations du role en fonction de l'id du role de l'utilisateur
							$types_users = find(array('table' => 'types_users', 'link' => $link, 'conditions' => 'id='.$_SESSION['role']));
							
							//On stocke
							$_SESSION['couleur'] = $types_users[0]['color'];
							
							//Récupération du rôle de l'utilisateur
							$acls = find(array('table' => 'acls', 'link' => $link, 'conditions' => 'types_user_id='.$bddRole));
							$crud = array();
							
							foreach($acls as $v){
								$controller = $v['controller'];
								$action = $v['action'];
								$is_auth = $v['is_auth'];
							
								$crud[$controller][$action] = $is_auth;
							}
							$_SESSION['crud']= $crud;
							
							redirect("articles"); //On redirige vers l'accueil
							
							
							
						}else{return array('errors' => "Vous n'avez pas les droits pour vous connecter !");}	
					}else{return array('errors' => "Le mot de passe n'est pas bon !");}				
				}else{return array('errors' => "Adresse mail inexistante !");}
			}else{return array('errors' => "Adresse mail invalide !");}
		}else{return array('errors' => "Les champs sont vides !");}	
	}	
}



/**
*Cette fonction permet de générer et d'envoyer un nouveau mot de passe en cas de perte
*/
function password() {
	
	global $link;
	if(isset($_POST) && !empty($_POST)){
		$postMail = $_POST['mail'];
		if(isset($_POST['mail']) && !empty($_POST['mail'])){
			if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['mail']))
			{
				$mail = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => "mail='".$postMail."'"));
				if(empty($mail)){return array('errors' => "Adresse mail inexistante !");}
				else{/*On envoi le mail contenant le nouveau mot de passe*/
	
				}
			}else{return array('errors' => "Adresse mail invalide !");}
		}else{return array('errors' => "Le champ mail est vide !");}	
	}
}



/**
*Cette fonction permet de se déconnecter
*/
function logout(){

	session_name("IEFM3D");//Retourne le nom de la session courante
	session_start();//Crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie
	session_unset();//Détruit toutes les variables de la session courante
	session_destroy();//Détruit toutes les données associées à la session courante
	redirect("users");//Redirection vers le formulaire de connexion
}



/**
*Cette fonction récupère la liste des utilisateurs
*/
function liste(){

	global $link;
	
	if(isset($_POST) && !empty($_POST)){
	
		$aDelete = array('table' => 'users','link' => $link);
		
		foreach($_POST['delete'] as $key => $value){
		
			if($value == 1){
				$aDelete['id'] = $key;
				delete($aDelete);
			}

		}
	}
	//Pagination
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page = $_GET['page'];
	}else{$page = 1;}
	
	$limit = 5; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	return array(
		'users' => find(array('table' => 'users', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link)),
		'pagination' => pagination('users', $limit)
	);
}



/**
*Cette fonction permet d'ajouter un nouvel utilisateur
*/
function add(){

	global $link;
	global $validate;
	$errors = array();

	if(isset($_POST) && !empty($_POST)) {
		
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		
		if(empty($errors)){
		
			//Cryptage du mot de passe en Sha1
			$cryptPassword = sha1($_POST['password']);
			$_POST['password'] = $cryptPassword;
			
			//Création du nom du dossier personnel
			$folderName = uniqid($_POST['prenom'].'_'.$_POST['nom'].'_');
			$_POST['folder'] = $folderName;
			
			//Création du dossier personnel
			mkdir(FILES.DS.$folderName);
			
			save(array('table' => 'users', 'link' => $link), $_POST);
			redirect('users/liste');
		}
		
	}
	
	return array(
		'usersTypesList' => findList(array('table' => 'types_users', 'link' => $link)),
		'userTypesSex'=> findSex(array('table' => 'sexes_users', 'link' => $link)),
		'errors' => $errors
	);
}



/**
*Cette fonction permet d'éditer les informations des utilisateurs
*/
function edit($id) {

	global $link;
	global $validate;
	global $table;
	$errors = array();
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
			save(array('table' => $table, 'link' => $link), $_POST);
			redirect('users/liste');
		}
	}
	
	$aReturn = array(
		'users' => findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'usersTypesList' => findList(array('table' => 'types_users', 'link' => $link)),	
		'userTypesSex'=> findSex(array('table' => 'sexes_users', 'link' => $link)),
		'errors' => $errors
	);
	return $aReturn;
}



/**
*Cette fonction permet d'éditer les informations des utilisateurs
*/
function profil() {

	
	global $link;
	global $validate;
	global $table;
	$errors = array();
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
		
			save(array('table' => $table, 'link' => $link), $_POST);
			redirect('articles/index');
		}
	}

	$aReturn = array(
		'users' => findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$_SESSION['user_id'])),
		'usersTypesList' => findRole(array('table' => 'types_users', 'link' => $link)),
		'errors' => $errors
	);
	
	return $aReturn;
}

/**
*Cette fonction permet d'éditer les informations des utilisateurs
*/
function view_profil($id) {

	global $link;
	global $validate;
	global $table;
	
	$profil = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$id));
	
	if($_SESSION['role'] == 10 || $_SESSION['role'] == 11){
		$_SESSION['folder'] = $profil['folder'];
		$_SESSION['ckfinder'] = 'pass';
	}
	
	$aReturn = array(
		'profil' => $profil,
		'usersTypesList' => findRole(array('table' => 'types_users', 'link' => $link)),		
	);
	return $aReturn;
}

/**
*Cette fonction permet de récupérer le contenu du dossier personnel de l'utilisateur connecté
*/
function document() {
	
}


/**
*Cette fonction permet la suppression d'un utilisateur
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'users', 'link' => $link, 'id' => $id));
	redirect('users/liste');
}



/**
*Cette fonction permet la suppression d'utilisateurs multiples
*/
function erase_all($id) {

	global $link;
	delete(array('table' => 'users', 'link' => $link, 'datas' => $_POST));
	redirect('users/liste');
}



function erreur() {

}
?>