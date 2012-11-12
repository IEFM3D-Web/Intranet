<?php
//On inclu les fonctions annexes
require(CONTROLLERS.DS.'controller.php');


/**
*Cette fonction récupère la liste des articles pour leur gestion
*/
function index(){

	global $link;
	
	if(isset($_POST) && !empty($_POST)){
		
		$aDelete = array('table' => 'sections','link' => $link);
		
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

	//Pagination
	$limit = 15; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	$sections = find(array('table' => 'sections', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link));
	krsort($sections);
	return array(
		'sections' => $sections,
		'pagination' => pagination($link,'sections', $limit)
	);
};



/**
*Cette fonction permet d'ajouter de nouveaux articles
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
			save(array('table' => 'sections', 'link' => $link), $_POST);
			$notification = 'success';
		}
		
	}

	return array(
		'errors' => $errors,
		'notification' => $notification
	);
	
};



/**
*Cette fonction permet l'édition des articles
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
			save(array('table' => $table, 'link' => $link), $_POST);
			$notification = 'success';
		}
	}
	
	$aReturn = array(
		'sections' => findFirst(array('table' => 'sections', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'errors' => $errors,
		'notification' => $notification
	);
	return $aReturn;
}



/**
*Cette fonction permet la suppression d'une articles
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'sections', 'link' => $link, 'id' => $id));
	redirect('sections/index');
}



/**
*Cette fonction permet la suppression de plusieurs articles
*/
function erase_all($id) {

	global $link;
	delete(array('table' => 'sections', 'link' => $link, 'datas' => $_POST));
	redirect('sections/index');
}