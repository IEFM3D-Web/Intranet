<?php
/**
 * Fonction permettant de créer un fichier de menu correspondant au role
 * 
 * @param 	varchar		$crud		Tableau contenant les règles du crud
 * @param 	int			$last_id	Dernière id enregistrée dans la table types_users
 * @author  Holic
 */
function menu($crud,$last_id){

	$value_menu = '';
	$value_menu .= '<div class="sidebarmenu">'."\n";
	
	//  catégories  //
	if(
		isset($crud['categories']['add']) && $crud['categories']['add'] == 1 || 
		isset($crud['categories']['index']) && $crud['categories']['index'] == 1)
	{
		$value_menu .= '	<a class="menuitem submenuheader" href="">Gestion des catégories</a>'."\n".'	<div class="submenu">'."\n".'		<ul>'."\n";
		if(isset($crud['categories']['add']) && $crud['categories']['add'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/categories/add"?>">Ajouter une catégorie</a></li>'."\n";}
		if(isset($crud['categories']['index']) && $crud['categories']['index'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/categories/index"?>">Gérer les catégories</a></li>'."\n";}
		$value_menu .= '		</ul>'."\n".'	</div>'."\n";
	}
	
	//  articles  //
	if(
		isset($crud['articles']['add']) && $crud['articles']['add'] == 1 || 
		isset($crud['articles']['liste']) && $crud['articles']['liste'] == 1)
	{
		$value_menu .= '	<a class="menuitem submenuheader" href="">Gestion des articles</a>'."\n".'	<div class="submenu">'."\n".'		<ul>'."\n";
		if(isset($crud['articles']['add']) && $crud['articles']['add'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/articles"?>">Afficher les articles</a></li>'."\n";}
		if(isset($crud['articles']['add']) && $crud['articles']['add'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/articles/add"?>">Ajouter un article</a></li>'."\n";}
		if(isset($crud['articles']['liste']) && $crud['articles']['liste'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/articles/liste"?>">Gérer les articles</a></li>'."\n";}
		$value_menu .= '		</ul>'."\n".'	</div>'."\n";
	}
	else{
		$value_menu .= '	<a class="menuitem" href="<?php echo BASE_URL."/articles"?>">Accueil</a>'."\n";
	}
	
	//  commentaires  //
	if(
		isset($crud['commentaires']['index']) && $crud['commentaires']['index'] == 1 )
	{
		$value_menu .= '	<a class="menuitem submenuheader" href="">Gestion des commentaires</a>'."\n".'	<div class="submenu">'."\n".'		<ul>'."\n";
		if(isset($crud['commentaires']['index']) && $crud['commentaires']['index'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/commentaires"?>">Gérer les commentaires</a></li>'."\n";}
		$value_menu .= '		</ul>'."\n".'	</div>'."\n";
	}
	
	//  utilisateurs  //
	if(
		isset($crud['users']['add']) && $crud['users']['add'] == 1 || 
		isset($crud['users']['liste']) && $crud['users']['liste'] == 1)
	{
		$value_menu .= '	<a class="menuitem submenuheader" href="">Gestion des utilisateurs</a>'."\n".'	<div class="submenu">'."\n".'		<ul>'."\n";
		if(isset($crud['users']['add']) && $crud['users']['add'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/users/add"?>">Ajouter un utilisateur</a></li>'."\n";}
		if(isset($crud['users']['liste']) && $crud['users']['liste'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/users/liste"?>">Gérer les utilisateurs</a></li>'."\n";}
		if(isset($crud['users']['upload']) && $crud['users']['upload'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/users/upload"?>">Envoi multiple</a></li>'."\n";}
		$value_menu .= '		</ul>'."\n".'	</div>'."\n";
	}
	//  sections  //
	if(
		isset($crud['sections']['add']) && $crud['sections']['add'] == 1 || 
		isset($crud['sections']['index']) && $crud['sections']['index'] == 1)
	{
		$value_menu .= '	<a class="menuitem submenuheader" href="">Gestion des sections</a>'."\n".'	<div class="submenu">'."\n".'		<ul>'."\n";
		if(isset($crud['sections']['add']) && $crud['sections']['add'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/sections/add"?>">Ajouter une section</a></li>'."\n";}
		if(isset($crud['sections']['index']) && $crud['sections']['index'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/sections/index"?>">Gérer les sections</a></li>'."\n";}
		$value_menu .= '		</ul>'."\n".'	</div>'."\n";
	}
	//  roles  //
	if(
		isset($crud['users_types']['add']) && $crud['users_types']['add'] == 1 || 
		isset($crud['users_types']['index']) && $crud['users_types']['index'] == 1)
	{
		$value_menu .= '	<a class="menuitem submenuheader" href="">Gestion des rôles</a>'."\n".'	<div class="submenu">'."\n".'		<ul>'."\n";
		if(isset($crud['users_types']['add']) && $crud['users_types']['add'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/users_types/add"?>">Ajouter un rôle</a></li>'."\n";}
		if(isset($crud['users_types']['index']) && $crud['users_types']['index'] == 1){$value_menu .= '			<li><a href="<?php echo BASE_URL."/users_types/index"?>">Gérer les rôles</a></li>'."\n";}
		$value_menu .= '		</ul>'."\n".'	</div>'."\n";
	}
	
	$value_menu .= '</div>';
	
	$menu = 'menu_'.$last_id;
	if(file_exists(ELEMENTS.DS.'intranet/menus/'.$menu.'.php')){unlink(ELEMENTS.DS.'intranet/menus/'.$menu.'.php');} //Si le fichier Existe, on le supprime (pour l'édition)
	$fp = fopen(ELEMENTS.DS."intranet/menus/".$menu.".php","a"); //Ouverture du fichier en écriture
	fputs($fp, $value_menu); //On écrit dans le fichier
	fclose($fp); //On ferme le fichier
}
?>