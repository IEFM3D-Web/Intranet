<?php
///////////////////////////////////////////////////
//   DEFINITION DES VARIABLES DE L'APPLICATION   //
define('DS', DIRECTORY_SEPARATOR); //D�finition du s�parateur dans le cas ou l'on est sur windows ou linux

define('WEBROOT', dirname(__FILE__)); //Chemin absolu vers le dossier webroot
	define('CSS', WEBROOT.DS.'css'); //Chemin absolu vers le dossier css
	define('FILES', WEBROOT.DS.'files'); //Chemin absolu vers le dossier files
	define('IMG', WEBROOT.DS.'img'); //Chemin absolu vers le dossier img
	define('JS', WEBROOT.DS.'js'); //Chemin absolu vers le dossier js
	define('UPLOAD', WEBROOT.DS.'upload'); //Chemin absolu vers le dossier upload

define('ROOT', dirname(WEBROOT)); //Chemin absolu vers le dossier racine du site
	define('CONFIGS', ROOT.DS.'configs'); //Chemin absolu vers le dossier configs
	define('CONTROLLERS', ROOT.DS.'controllers'); //Chemin absolu vers le dossier controllers
	define('LIB', ROOT.DS.'lib'); //Chemin absolu vers le dossier lib
	define('MODELS', ROOT.DS.'models'); //Chemin absolu vers le dossier models
	define('VIEWS', ROOT.DS.'views'); //Chemin absolu vers le dossier include
		define('ELEMENTS', VIEWS.DS.'elements'); //Chemin absolu vers le dossier elements
		define('HELPERS', VIEWS.DS.'helpers'); //Chemin absolu vers le dossier helpers
		define('LAYOUT', VIEWS.DS.'layout'); //Chemin absolu vers le dossier layout

///////////////////////////////////////////////////

/////////////////////////////////////////////////////////
//   MISE EN PLACE DU CHEMIN RELATIF VERS LE WEBROOT   //
//http://www.siteduzero.com/forum-83-692076-p1-base-url.html
//define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME']))); //Chemin relatif vers le coeur de l'application --> OLD

$baseUrl = '';
$scriptPath = preg_split("#[\\\\/]#", dirname(__FILE__), -1, PREG_SPLIT_NO_EMPTY);
$urlPath = preg_split("#[\\\\/]#", $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_NO_EMPTY);
if(isset($urlPath[0])) {
	
	$key = array_search($urlPath[0], $scriptPath);
	if(false !== $key) $baseUrl = "/".$urlPath[0];
}
define('BASE_URL', $baseUrl); //Chemin relatif vers le coeur de l'application

//////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////
//   INCLUSION DES LIBRAIRIES, HELPERS ET fichiers DE CONFIGS   //
$aLibs = array('functions','menu','session','set','string','inflector','file_and_dir');
$aHelpers = array('html','form');
$aConfigs = array('database','mail');

foreach($aLibs as $sLibrairie) { require_once(LIB.DS.$sLibrairie.'.php'); }
foreach($aHelpers as $sHelper) { require_once(HELPERS.DS.$sHelper.'.php'); }
foreach($aConfigs as $sConfig) { require_once(CONFIGS.DS.$sConfig.'.php'); }
//////////////////////////////////////////////////////////////////

//Initialisation de la session
Session::init();


////////////////////////////
//   FORMATAGE DE L'URL   //
$sUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/'; //Affectation de l'url
/*
//Notation similaire
if(isset($_SERVER['PATH_INFO'])) { $sUrl = $_SERVER['PATH_INFO']; } 
else { $sUrl = '/'; }
*/
$sUrl = trim($sUrl, '/'); //On enl�ve les / en d�but et fin de chaine
$aParams = explode('/', $sUrl); //On r�cup�re l'url sous forme de tableau

//R�cup�ration du contr�leur
//On va tester si le premier param�tre existe et si il est non vide
if(isset($aParams[0]) && !empty($aParams[0])) {
	
	//Si il existe on le stocke dans une variable et on le supprime du tableau des param�tres
	$sController = $aParams[0]; 
	unset($aParams[0]);
	
} else { $sController = 'users'; } //Sinon on fait appel � un contr�lleur par d�faut 

//R�cup�ration de l'action
//On va tester si le second param�tre existe et si il est non vide
if(isset($aParams[1]) && !empty($aParams[1])) {

	//Si il existe on le stocke dans une variable et on le supprime du tableau des param�tres
	$sAction = $aParams[1];
	unset($aParams[1]);

} else { $sAction = 'index'; } //Sinon on fait appel � une action par d�faut
////////////////////////////

if(file_exists(CONTROLLERS.DS.$sController.'.php')) {

	$sModel = substr($sController, 0, -1);
	
	if(file_exists(MODELS.DS.$sModel.'.php')) {

		include(MODELS.DS.$sModel.'.php'); //On proc�de � l'inclusion du model
		include(CONTROLLERS.DS.$sController.'.php'); //On proc�de � l'inclusion du contr�leur
		
		if(function_exists($sAction)) {
			
			if(file_exists(VIEWS.DS.$sController.DS.$sAction.'.php')) {
			
					if($sController == 'users' && $sAction == 'index' || $sAction == 'password'){
						$sLayout = 'users';
					}
					else{
		
						if(!Session::check('isAuth')){
							redirect("users"); //On redirige vers la page de login
						}
						
						if( $sController.DS.$sAction != 'articles'.DS.'index' && $sController.DS.$sAction != 'users'.DS.'index' && $sAction != 'view_article' && $sAction != 'profil' && $sAction != 'logout' && $sAction != 'erreur' && $sAction != 'document'){
							if(!Session::check('crud.'.$sController.'.'.$sAction)) {
								redirect("users/erreur"); //Si la personne n'a pas acc�s a cette page, on la redirige vers l'accueil
							}
						}
						
					$sLayout = 'intranet';
					}
					
			
				if(file_exists(LAYOUT.DS.$sLayout.'.php')) {
				
					$aControllerDatas = call_user_func_array($sAction, $aParams); //On fait appel � la fonction de ce contr�leur
					ob_start(); //On va r�cup�rer dans une variable le contenu de la vue pour l'affichage dans la variable layout_for_content
					include(VIEWS.DS.$sController.DS.$sAction.'.php'); //Chargement de la vue
					$content_for_layout = ob_get_clean(); //On stocke dans cette variable le contenu de la vue
			
					include(LAYOUT.DS.$sLayout.'.php'); //Inclusion du layout
					
				} else { echo "Le layout ".$sLayout." n'existe pas!!!"; }
			} else { echo "Le controller ".$sController." n'a pas de vue ".$sAction."!!!"; }
		} else { echo "Le controller ".$sController." n'a pas de fonction ".$sAction."!!!"; }
	} else { echo "Le model ".$sModel." n'existe pas!!!"; }
} else { echo "Le controller ".$sController." n'existe pas!!!"; }