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
	
	//On test si le numéro de page est passé dans l'URL
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page = $_GET['page'];
		
	//Si il n'y en a pas, on charge la page 1 par défault
	}else{$page = 1;}
	
	$limit = 3; //Limite d'éléments par page
	$start = ($page - 1) * $limit;
	
	//On récupère les articles
	$articles = find(array('table' => 'articles', 'conditions' => 'online = 1', 'limite' => array('start' =>$start, 'limit' =>$limit), 'link' => $link));
	
	//On parcours les articles
	foreach($articles as $k => $v){
		
		$articleID = $v['id'];
		
		//On stock l'id de chaque article et le nombre de commentaires associés dans un tableau
		$nbComments[$articleID] = count(find(array('table' => 'commentaires', 'conditions' => 'articles_id = '.$articleID.' AND online = 1', 'link' => $link)));
		
	}
	
	return array(
		'articles' => $articles,
		'authorList' => findAuthor(array('table' => 'users', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'pagination' => pagination($link,'articles', $limit, 'online = 1'),
		'nbComments' => $nbComments
	);
	
};


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
		'pagination' => pagination($link,'articles', $limit)
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
		'pagination' => pagination($link,'commentaires', $limit, 'online = 1'),
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