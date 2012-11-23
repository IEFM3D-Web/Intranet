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
		Session::write('success','Commentaires supprimés avec succès.');		
		redirect('commentaires/index');
	}
	
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page = $_GET['page'];
	}else{$page = 1;}
	
	//Pagination
	$limit = 15; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	return array(
		'commentaires' => find(array('table' => 'commentaires', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link)),
		'authorList' => findAuthor(array('table' => 'users', 'link' => $link)),
		'articleList' => findArticle(array('table' => 'articles', 'link' => $link)),
		'pagination' => pagination($link, 'commentaires', $limit)
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
			Session::write('success','Commentaire modifié avec succès.');
			redirect('commentaires/index');
		}
	}
	
	$aReturn = array(
		'commentaires' => findFirst(array('table' => 'commentaires', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'errors' => $errors
	);
	return $aReturn;
}



/**
*Cette fonction permet la suppression d'un commentaire
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'commentaires', 'link' => $link, 'id' => $id));
	Session::write('success','Commentaire supprimé avec succès.');
	redirect('commentaires/index');
}

function publish($id, $newValueOnline){
	
	global $link;
	global $table;
	
	//On test si les paramètres nécessaires existent
	if(isset($id) && isset($newValueOnline)){
	
		save(array('table' => $table, 'link' => $link), array('id' => $id, 'online' => $newValueOnline));
	}
	
	//on redirige vers la liste des commentaires
	redirect('commentaires/index');
}