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
	
	//On test si un fomulaire a été envoyé
	if(isset($_POST) && !empty($_POST)){

		//On test si c'est le formulaire de connexion qui a été envoyé
		if($_POST['form'] == "connexion"){
		
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
								
							}else{return array('errors-connexion' => "Vous n'avez pas les droits pour vous connecter.");}	
						}else{return array('errors-connexion' => "Le mot de passe est incorrect.");}				
					}else{return array('errors-connexion' => "Adresse mail inexistante.");}
				}else{return array('errors-connexion' => "Adresse mail invalide.");}
			}else{return array('errors-connexion' => "Les champs sont vides.");}	
			
		}
		
		//Sinon on test si c'est le formulaire de mot de passe oublié qui a été envoyé
		else if($_POST['form'] == "password"){
			
			global $mail;
			
			$errors = '';
			$success = '';
		
			$postMail = $_POST['mail'];
			if(isset($_POST['mail']) && !empty($_POST['mail'])){
			
				//On vérifi que l'adresse mail est bien valide à l'aide d'expression régulière
				if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['mail'])){

					//On vérifi que l'adresse mail existe bien dans la base de données
					$findMail = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => "mail='".$postMail."'"));
					if(empty($findMail)){
						
						Session::write('errors-password',"Adresse mail inexistante.");
						redirect("users/index#password");
					}else{
						
						//On récupère les informations de l'utilisateur en fonction de son adresse mail
						$user = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => "mail='".$postMail."'"));
						
						//On ajoute son Id au tableau $_POST
						$_POST['id'] = $user['id'];	
						
						//Génération du nouveau mot de passe
						$newPassword = genere_Password(6);
						
						//On ajoute le nouveau mot de passe au tableau $_POST
						$_POST['password'] = sha1($newPassword);	
						
						//On supprime le mail et le type de formulaire du tableau $_POST
						unset($_POST['mail']);
						unset($_POST['form']);
						
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
							Session::write('success-password',"Nouveau mot de passe envoyé.");
						}

					}
				}else{Session::write('errors-password',"Adresse mail invalide.");}
			}else{Session::write('errors-password',"Le champ mail est vide.");}
			
			redirect("users/index#password");
		}
	}	
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
		Session::write('success','Utilisateurs supprimés avec succès.');		
		redirect('users/liste');
	}
	//Pagination
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page = $_GET['page'];
	}else{$page = 1;}
	
	$limit = 15; //Limite d'éléments par page
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

	if(isset($_POST) && !empty($_POST)) {
		
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
			$errors = validates($validate, $_POST);
		}
		
		if(empty($errors)){
		
			//Cryptage du mot de passe en Sha1
			$cryptPassword = sha1($_POST['password']);
			$_POST['password'] = $cryptPassword;
			
			//Création du nom du dossier personnel
			$folderName = create_folder_name($_POST['prenom'].' '.$_POST['nom'].' ');
			
			$_POST['folder'] = $folderName;
				
			$folderName = FILES.DS.$folderName;

			$foldersToCreate = array(
				$folderName,
				$folderName.DS.'_thumbs',
				$folderName.DS.'_thumbs'.DS.'Files',
				$folderName.DS.'_thumbs'.DS.'Flash',
				$folderName.DS.'_thumbs'.DS.'Images',
				$folderName.DS.'files',
				$folderName.DS.'flash',
				$folderName.DS.'images'
			);
			
            foreach($foldersToCreate as $folder) { FileAndDir::createPath($folder); }

			//Création de l'utilisateur
			save(array('table' => 'users', 'link' => $link), $_POST);
			Session::write('success','Utilisateur ajouté avec succès.');
			redirect('users/liste');
		}
		
	}
	
	return array(
		'usersTypesList' => findList(array('table' => 'types_users', 'link' => $link)),
		'userTypesSex'=> findSex(array('table' => 'sexes_users', 'link' => $link)),
		'userTypesSection'=> findList(array('table' => 'sections', 'link' => $link)),
		'errors' => $errors
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

	$requestDatas = get_resquest_datas();
	
	if(isset($requestDatas) && !empty($requestDatas)) {
	
		//On test si au moins un élève est selectionné
		if(count($requestDatas)>1){
		
			if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
				$errors = validates($validate, $requestDatas);
			}

			if(empty($errors)){

				if(isset($requestDatas['file'])) { 
					
					$file2Upload = $requestDatas['file'];
					unset($requestDatas['file']);
				}
			
				require_once(LIB.DS.'upload.php');
				$handle = new Upload($file2Upload);
				if($handle->uploaded) {
			
					foreach($requestDatas as $key => $value){
												
						$filePath = WEBROOT.DS."files".DS.$key.DS.'files';							
						$handle->Process($filePath);					
					}
										
					$fileName = $handle->file_dst_name;
					$handle->Clean();
				}
				
				$notification = 'success';
			}
		}else{$errors['file'] = 'Vous devez selectionner au moins un élève';}
		
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
	
	if(isset($_POST) && !empty($_POST)) {
	
		//On vérifi que la variable de validation contenant les règles n'est pas vide
		if(!empty($validate)){ 
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
			
			//On récupère les informations de l'utilisateur
			$user = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$id));	

			//On récupère le nom du dossier actuel de l'utilisateur
			$oldFolderName = $user['folder'];
				
			//On test si le dossier de l'utilisateur existe
			if(FileAndDir::dexists(FILES.DS.$oldFolderName)){
				
				//On génère le nom du dossier à modifier
				$newFolderName = create_folder_name($_POST['prenom'].' '.$_POST['nom'].' ');
				
				$_POST['folder'] = $newFolderName;
				
				//On met à jour les informations de l'utilisateur
				save(array('table' => $table, 'link' => $link), $_POST);

				//On renomme le dossier personnel de l'utilisateur
				//sleep(1);
				FileAndDir::rename(FILES.DS.$oldFolderName, FILES.DS.$newFolderName);
				Session::write('success','Utilisateurs modifié avec succès.');
				redirect('users/liste');

			}else{

				//Création du nom du dossier personnel
				$folderName = create_folder_name($_POST['prenom'].' '.$_POST['nom'].' ');
				
				$_POST['folder'] = $folderName;
					
				$folderName = FILES.DS.$folderName;

				$foldersToCreate = array(
					$folderName,
					$folderName.DS.'_thumbs',
					$folderName.DS.'_thumbs'.DS.'Files',
					$folderName.DS.'_thumbs'.DS.'Flash',
					$folderName.DS.'_thumbs'.DS.'Images',
					$folderName.DS.'files',
					$folderName.DS.'flash',
					$folderName.DS.'images'
				);
				
				foreach($foldersToCreate as $folder) { FileAndDir::createPath($folder); }
				
				//On met à kour les informations de l'utilisateur
				save(array('table' => $table, 'link' => $link), $_POST);
				Session::write('success','Utilisateurs modifié avec succès.');
				redirect('users/liste');
			}
		}
	}
	
	$aReturn = array(
		'users' => findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'usersTypesList' => findList(array('table' => 'types_users', 'link' => $link)),	
		'userTypesSection'=> findList(array('table' => 'sections', 'link' => $link)),
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
	$notification = '';
	
	//Récupération des information de l'utilisateur
	$user = findFirst(array('table' => 'users', 'link' => $link, 'conditions' => 'id='.Session::read('user_id')));
	
	//On test si le dossier de l'utilisateur n'existe pas
	if(!FileAndDir::dexists(FILES.DS.$user['folder'])){
			
			//Création du nom du dossier personnel
			$folderName = FILES.DS.$user['folder'];

			$foldersToCreate = array(
				$folderName,
				$folderName.DS.'_thumbs',
				$folderName.DS.'_thumbs'.DS.'Files',
				$folderName.DS.'_thumbs'.DS.'Flash',
				$folderName.DS.'_thumbs'.DS.'Images',
				$folderName.DS.'files',
				$folderName.DS.'flash',
				$folderName.DS.'images'
			);
			
			foreach($foldersToCreate as $folder) { FileAndDir::createPath($folder); }
	}
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
		
			//On test si un mot de passe a été envoyé
			if(isset($_POST['password']) && !empty($_POST['password'])){
				
				//Cryptage du mot de passe en Sha1
				$cryptPassword = sha1($_POST['password']);		
			}
			//On efface le mot de passe de la variable $_POST avant la validation vue que ce champ est optionnel
			unset($_POST['password'] );
			
			$errors = validates($validate, $_POST);
		}
		
		if(isset($cryptPassword)){$_POST['password'] = $cryptPassword;}
		
		if(empty($errors)){

			//modification du profil
			save(array('table' => $table, 'link' => $link), $_POST);
			$notification = 'success';
		}
	}
	
	$aReturn = array(
		'users' => $user,
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
	Session::write('success','Utilisateur supprimé avec succès.');
	redirect('users/liste');
}

function erreur() {

}

function publish($Id, $newValueOnline){
	
	global $link;
	global $table;
	
	//On test si les paramètres nécessaires existent
	if(isset($id) && isset($newValueOnline)){
	
		save(array('table' => $table, 'link' => $link), array('id' => $id, 'is_auth' => $newValueOnline));
	}
	
	//On redirige vers la liste des utilisateurs
	redirect('users/liste');
}
?>