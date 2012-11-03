<?php
//On inclu les fonctions annexes
require(CONTROLLERS.DS.'controller.php');



/**
*Cette fonction récupère la liste des commentaires pour leur gestion
*/
function index(){

	global $link;
	
	if(isset($_POST) && !empty($_POST)){
		
		$aDelete = array('table' => 'commentaires','link' => $link);
		
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
	$limit = 5; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	return array(
		'commentaires' => find(array('table' => 'commentaires', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link)),
		'authorList' => findAuthor(array('table' => 'users', 'link' => $link)),
		'articleList' => findArticle(array('table' => 'articles', 'link' => $link)),
		'pagination' => pagination($link, 'articles', $limit)
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
		'commentaires' => findFirst(array('table' => 'commentaires', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'errors' => $errors,
		'notification' => $notification
	);
	return $aReturn;
}



/**
*Cette fonction permet la suppression d'un commentaire
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'commentaires', 'link' => $link, 'id' => $id));
	redirect('commentaires/index');
}

function publish($commentId, $newValueOnline){
	
	global $link;
	global $table;
	save(array('table' => $table, 'link' => $link), array('id' => $commentId, 'online' => $newValueOnline));
	redirect('commentaires/index');

}

/**
*Cette fonction permet la suppression de plusieurs commentaires
*/
function erase_all($id) {

	global $link;
	delete(array('table' => 'articles', 'link' => $link, 'datas' => $_POST));
	redirect('articles/liste');
}