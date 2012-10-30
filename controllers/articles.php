<?php
//On inclu les fonctions annexes
require(CONTROLLERS.DS.'controller.php');



/**
*Cette fonction correspond à la page d'accueil de l'intranet, les articles y sont affichées
*/
function index(){

	global $link;

	if(isset($_POST) && !empty($_POST)){
		
		$aDelete = array('table' => 'articles','link' => $link);
		
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
	$limit = 3; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	
	
	return array(
		'articles' => find(array('table' => 'articles', 'conditions' => 'online = 1', 'limite' => array('start' =>$start, 'limit' =>$limit), 'link' => $link)),
		'authorList' => findAuthor(array('table' => 'users', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'pagination' => pagination('articles', $limit, 'online = 1')
	);
	
};


function get_nb_comments($articleID) {

$sql = "SELECT * FROM commentaires WHERE articles_id = ".$articleID." AND online = 1";
$query = mysql_query($sql);
$nbComments = mysql_num_rows($query);

return $nbComments;

}


/**
*Cette fonction récupère la liste des articles pour leur gestion
*/
function liste(){

	global $link;
	
	if(isset($_POST) && !empty($_POST)){
		
		$aDelete = array('table' => 'articles','link' => $link);
		
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
		'articles' => find(array('table' => 'articles', 'limite' => array('start' =>$start, 'limit' =>$limit),'link' => $link)),
		'authorList' => findAuthor(array('table' => 'users', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'pagination' => pagination('articles', $limit)
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
			save(array('table' => 'articles', 'link' => $link), $_POST);
			redirect('articles/liste');
			die();
		}
		
	}
	
	return array(
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
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
			redirect('articles/liste');
		}
	}
	
	$aReturn = array(
		'articles' => findFirst(array('table' => 'articles', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'errors' => $errors
	);
	return $aReturn;
}


/**
*Cette fonction permet l'édition des articles
*/
function view_article($id) {

	global $link;
	global $validate;
	global $table;
	$errors = array();
	$success_comment = "";
	
	if(isset($_POST) && !empty($_POST)) {
	
		if(!empty($validate)){ //On vérifi que la variable de validation contenant les règles n'est pas vide
		
			$errors = validates($validate, $_POST);
		}
		if(empty($errors)){
			save(array('table' => 'commentaires', 'link' => $link), $_POST);
			$success_comment = "ok";
		}
	}
	
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page = $_GET['page'];
	}else{$page = 1;}
	//Pagination
	$limit = 5; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	$aReturn = array(
		'articles' => findFirst(array('table' => 'articles', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'authorList' => findAuthor(array('table' => 'users', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'commentaires' => find(array('table' => 'commentaires', 'conditions' => 'online = 1 and articles_id ='.$id, 'limite' => array('start' => $start, 'limit' =>$limit), 'link' => $link)),
		'pagination' => pagination('commentaires', $limit, 'online = 1'),
		'errors' => $errors,
		'success_comment' => $success_comment
	);
	return $aReturn;
}


function publish($articleId, $newValueOnline){
	
	global $link;
	global $table;
	save(array('table' => $table, 'link' => $link), array('id' => $articleId, 'online' => $newValueOnline));
	redirect('articles/liste');

}

/**
*Cette fonction permet la suppression d'un articles
*/
function erase($id) {
	
	global $link;
	delete(array('table' => 'articles', 'link' => $link, 'id' => $id));
	redirect('articles/liste');
}



/**
*Cette fonction permet la suppression de plusieurs articles
*/
function erase_all($id) {

	global $link;
	delete(array('table' => 'articles', 'link' => $link, 'datas' => $_POST));
	redirect('articles/liste');
}