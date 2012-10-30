<?php
//On inclu les fonctions annexes
require(CONTROLLERS.DS.'controller.php');


/**
*Cette fonction récupère la liste des articles pour leur gestion
*/
function index(){

	global $link;
	
	if(isset($_POST) && !empty($_POST)){
		
		$aDelete = array('table' => 'articles_types','link' => $link);
		
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
	$limit = 10; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	return array(
		'categories' => find(array('table' => 'articles_types', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link)),
		'pagination' => pagination($link,'articles_types ', $limit)
	);
};



/**
*Cette fonction permet d'ajouter de nouveaux articles
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
			save(array('table' => 'articles_types', 'link' => $link), $_POST);
			redirect('categories/index');
		}
		
	}
	
	return array(
		'errors' => $errors
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
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
		
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
			save(array('table' => $table, 'link' => $link), $_POST);
			redirect('categories/index');
		}
	}
	
	$aReturn = array(
		'categories' => findFirst(array('table' => 'articles_types', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'errors' => $errors
	);
	return $aReturn;
}



/**
*Cette fonction permet la suppression d'une articles
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'articles_types', 'link' => $link, 'id' => $id));
	redirect('categories/index');
}



/**
*Cette fonction permet la suppression de plusieurs articles
*/
function erase_all($id) {

	global $link;
	delete(array('table' => 'articles_types', 'link' => $link, 'datas' => $_POST));
	redirect('categories/index');
}