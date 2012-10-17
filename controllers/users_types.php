<?php
//On inclu les fonctions annexes
require(CONTROLLERS.DS.'controller.php');



/**
*Cette fonction récupère la liste des rôles pour leur gestion
*/
function index(){

	global $link;
	
	if(isset($_POST) && !empty($_POST)){
		
		$aDelete = array('table' => 'types_users','link' => $link);
		
		foreach($_POST['delete'] as $key => $value){
		
			if($value == 1){
				$aDelete['id'] = $key;
				delete($aDelete);
			}

		}
	}
	
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page = $_GET['page'];
	}else{$page = 1;}
	
	$limit = 10; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	return array(
		'types' => find(array('table' => 'types_users', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link)),
		'pagination' => pagination('types_users', $limit)
	);
}



/**
*Cette fonction permet d'ajouter de nouveaux rôles
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
		
			$crud = $_POST['crud'];
			unset($_POST['crud']);
			$last_id = save(array('table' => 'types_users', 'link' => $link), $_POST);
			
			foreach($crud as $controller => $controllerValue){
				foreach($controllerValue as $action => $is_auth){

					$tableau = array('controller'=>$controller, 'action'=>$action, 'is_auth'=>$is_auth, 'types_user_id'=>$last_id);
					save(array('table' => 'acls', 'link' => $link), $tableau);
				}
			}
			
			menu($crud,$last_id); //Génération du menu en fonctiond du crud
			redirect('users_types/index');
		}
		
	}
	
	return array(
		'errors' => $errors
	);
}



/**
*Cette fonction permet l'édition des rôles
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
		
			$crud = $_POST['crud'];
			
			//Si l'on donne l'accès à laliste des utilisateurs, alors, on pourra consulter les profils.
			if($crud['users']['liste'] == 1){
				$crud['users']['view_profil'] = 1;
			}
			
			unset($_POST['crud']);
			$last_id = save(array('table' => 'types_users', 'link' => $link), $_POST);
			
			if(isset($id)){delete_by_name(array('table' => 'acls', 'link' => $link, 'name' => 'types_user_id', 'value' => $id));}
			
			foreach($crud as $controller => $controllerValue){
				foreach($controllerValue as $action => $is_auth){
					$tableau = array('controller'=>$controller, 'action'=>$action, 'is_auth'=>$is_auth, 'types_user_id'=>$last_id);
					save(array('table' => 'acls', 'link' => $link), $tableau);
				}
			}
			menu($crud,$last_id); //Génération du menu en fonctiond du crud
			redirect('users_types/index');
		}
	}
	
	$acls = find(array('table' => 'acls', 'link' => $link, 'conditions' => 'types_user_id='.$id));
	$crud = array();
	
	foreach($acls as $v){
		$controller = $v['controller'];
		$action = $v['action'];
		$is_auth = $v['is_auth'];
	
		$crud['crud'][$controller][$action] = $is_auth;
	}	
	
	$aReturn = array(
		'types' => findFirst(array('table' => 'types_users', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'crud' => $crud,
		'errors' => $errors
	);
	return $aReturn;
}



/**
*Cette fonction permet la suppression d'un rôle
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'types_users', 'link' => $link, 'id' => $id)); //On supprime le role de la table types_users
	delete_by_name(array('table' => 'acls', 'link' => $link, 'name' => 'types_user_id', 'value' => $id)); //On supprime le role de la table acls
	if(file_exists(ELEMENTS.DS.'intranet/menus/menu_'.$id.'.php')){unlink(ELEMENTS.DS.'intranet/menus/menu_'.$id.'.php');} //On supprime le menu associé au role
	redirect('users_types/index');
}



/**
*Cette fonction permet la suppression de plusieurs rôles
*/
function erase_all($id) {

	global $link;
	delete(array('table' => 'types_users', 'link' => $link, 'datas' => $_POST));
	redirect('users_types/index');
}
?>