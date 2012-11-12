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
							
							//Insertion des données de session
							Session::write('isAuth',true);
							Session::write('user_id',$bddId);
							Session::write('nom',$bddNom);
							Session::write('role',$bddRole);
							Session::write('prenom',$bddPrenom);
							Session::write('folder',$bddFolder);
							
							//On récupère les informations du role en fonction de l'id du role de l'utilisateur
							$types_users = find(array('table' => 'types_users', 'link' => $link, 'conditions' => 'id='.Session::read('role')));
							
							//On stock la couleur récupérée
							Session::write('couleur',$types_users[0]['color']);
							
							//Récupération du rôle de l'utilisateur
							$acls = find(array('table' => 'acls', 'link' => $link, 'conditions' => 'types_user_id='.$bddRole));
							$crud = array();
							
							foreach($acls as $v){
								$controller = $v['controller'];
								$action = $v['action'];
								$is_auth = $v['is_auth'];
							
								$crud[$controller][$action] = $is_auth;
							}
							
							//On stock le tableau de CRUD
							Session::write('crud',$crud);
							
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
	global $mail;
	
	$errors = '';
	$success = '';
	
	if(isset($_POST) && !empty($_POST)){
	
		$postMail = $_POST['mail'];
		if(isset($_POST['mail']) && !empty($_POST['mail'])){
		
			//On vérifi que l'adresse mail est bien valide à l'aide d'expression régulière
			if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['mail'])){

				//On vérifi que l'adresse mail existe bien dans la base de données
				$findMail = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => "mail='".$postMail."'"));
				if(empty($findMail)){
					return array('errors' => "Adresse mail inexistante !");
				}else{
					
					//On récupère les informations de l'utilisateur en fonction de son adresse mail
					$user = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => "mail='".$postMail."'"));
					
					//On ajoute son Id au tableau $_POST
					$_POST['id'] = $user['id'];	
					
					//Génération du nouveau mot de passe
					$newPassword = genere_Password(6);
					
					//On ajoute le nouveau mot de passe au tableau $_POST
					$_POST['password'] = sha1($newPassword);	
					
					//On supprime le mail du tableau $_POST
					unset($_POST['mail']);
					
					//Mise à jour du mot de passe
					save(array('table' => 'users', 'link' => $link), $_POST);
				
					//Inclusion de la librairie Swift Mailler
					require(LIB.DS.'swift/swift_required.php');
					
					//Création d'une instance de swift transport (SMTP)
					$transport = Swift_SmtpTransport::newInstance($mail['smtp'], $mail['port'])
					->setUsername($mail['user'])
					->setPassword($mail['password']);
					
					//Création d'une instance de swift mailer
					$mailer = Swift_Mailer::newInstance($transport);

					//Création du mail
					$message = Swift_Message::newInstance('Nouveau mot de passe')
					->setFrom(array('john@doe.com' => 'IEFM3D'))
					->setTo(array($postMail))
					->setBody('Voici votre nouveau mot de passe : '.$newPassword);

					//Envoi du message
					$result = $mailer->send($message);

					if($result){
						$success = 'oui';
					}

				}
			}else{$errors = "Adresse mail invalide !";}
		}else{$errors = "Le champ mail est vide !";}	
	}
	
	return array(
		'errors' => $errors,
		'success' => $success
	);
}

/**
*Cette fonction permet de se déconnecter
*/
function logout(){

	Session::destroy();
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
		'pagination' => pagination($link, 'users', $limit)
	);
}

/**
*Cette fonction permet d'ajouter un nouvel utilisateur
*/
function add(){

	global $link;
	global $validate;
	
	$errors = array();
	$notification = '';

	if(isset($_POST) && !empty($_POST)) {
		
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		
		if(empty($errors)){
		
			//Cryptage du mot de passe en Sha1
			$cryptPassword = sha1($_POST['password']);
			$_POST['password'] = $cryptPassword;
			
			//Création du nom du dossier personnel
			$folderName = strtolower(filter(uniqid($_POST['prenom'].'_'.$_POST['nom'].'_')));
			$_POST['folder'] = $folderName;
			
			//Création du dossier personnel
			mkdir(FILES.DS.$folderName);
			
			//Création de l'utilisateur
			save(array('table' => 'users', 'link' => $link), $_POST);
			$notification = 'success';
		}
		
	}
	
	return array(
		'usersTypesList' => findList(array('table' => 'types_users', 'link' => $link)),
		'userTypesSex'=> findSex(array('table' => 'sexes_users', 'link' => $link)),
		'userTypesSection'=> findList(array('table' => 'sections', 'link' => $link)),
		'errors' => $errors,
		'notification' => $notification
	);
}

/**
*Cette fonction permet d'ajouter un nouvel utilisateur
*/
function upload(){

	global $link;
	global $validate;
	
	$errors = array();
	$notification = '';

	if(isset($_POST) && !empty($_POST)) {
		
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		
		if(empty($errors)){
		
			//Appel de la classe upload
			pr($_POST);
			foreach($_POST as $key => $value){
			
				//upload_files();
			}
			
			$notification = 'success';
		}
		
	}
	
	$users =  find(array('table' => 'users', 'fields' => array('folder','nom','prenom','section_id'), 'link' => $link));
	
	$userTypesSection = findList(array('table' => 'sections', 'link' => $link));
	
	$end = array();
	
	foreach($userTypesSection as $k_section => $v_section){
	
		$end[$k_section] = array();
		
	}
	
	foreach($users as $k_user => $v_user){
	
		foreach($end as $k_end=> $v_end){
	
			if($v_user['section_id'] == $k_end){
			
				$end[$k_end][] = $users[$k_user];
			} 
		
		}

	}
	
	//pr($end);
	
	return array(
		'sections_users' => $end,
		'sections_liste' => $userTypesSection,
		'errors' => $errors,
		'notification' => $notification
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
	$notification = '';
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
			
			//On récupère les informations de l'utilisateur
			$user = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$id));	

			//On récupère le nom du dossier actuel
			$oldFolderName = $user['folder'];
				
			//Préparation des variables qui servirons au nouveau nom de dossier	
			$nom = strtolower(filter($_POST['nom']));
			$prenom = strtolower(filter($_POST['prenom']));
				
			//Création du nouveau nom du dossier personnel
			$newFolderName = uniqid($prenom.'_'.$nom.'_');
			
			$_POST['folder'] = $newFolderName;	
			
			//On met à kour les informations de l'utilisateur
			save(array('table' => $table, 'link' => $link), $_POST);
			$notification = 'success';
			
			//On renomme le dossier personnel de l'utilisateur
			sleep(1);
			rename(FILES.DS.$oldFolderName, FILES.DS.$newFolderName);
		}
	}
	
	$aReturn = array(
		'users' => findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'usersTypesList' => findList(array('table' => 'types_users', 'link' => $link)),	
		'userTypesSection'=> findList(array('table' => 'sections', 'link' => $link)),
		'userTypesSex'=> findSex(array('table' => 'sexes_users', 'link' => $link)),
		'errors' => $errors,
		'notification' => $notification
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
	$notification = '';
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
		
		
			if(!empty($_POST)){
			
				//Cryptage du mot de passe en Sha1
				$cryptPassword = sha1($_POST['password']);
				$_POST['password'] = $cryptPassword;
			
			}
		
			save(array('table' => $table, 'link' => $link), $_POST);
			$notification = 'success';
		}
	}
	
	$aReturn = array(
		'users' => findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.Session::read('user_id'))),
		'usersTypesList' => findRole(array('table' => 'types_users', 'link' => $link)),
		'errors' => $errors,
		'notification' => $notification
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
	
	
	if(Session::read('role') <= 3){

		Session::write('folder',$profil['folder']);
		Session::write('ckfinder','pass');
	}
	
	$aReturn = array(
		'profil' => $profil,
		'usersTypesList' => findRole(array('table' => 'types_users', 'link' => $link)),
		'usersSectionsList' => findSection(array('table' => 'sections', 'link' => $link))
	);
	return $aReturn;
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