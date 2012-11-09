<?php
/**
*
*Classe statique permettant la gestion des sessions
*/
class Session {
	
	/**
	* 
	*Fonction chargée de l'initialisation des variables de session
	*/
	static function init() {
				
		$sessionName = Inflector::variable(Inflector::slug('Intranet Iefm3d '.$_SERVER['HTTP_HOST']));
		session_name($sessionName);
		session_start();	
	}
	
	/**
	* 
	*Fonction chargée de lire uen donnée dans la variables de session
	*/
	static function read($key) {
	
		$result = Set::classicExtract($_SESSION, $key);
		if(!is_null($result)) { return $result; }
		else { return false; }	
	}
	
	/**
	* 
	*Fonction chargée d'écrire une donnée dans la variable de session
	*/
	static function write($key, $value) {
	
		$_SESSION = Set::insert($_SESSION, $key, $value);
		
		//Pour vérifier que la valeur insérée correspond bien
		//return (set::classicExtract($_SESSION, $key) === $value);	
	}
	
	/**
	* 
	*Fonction chargée de supprimer une donnée dans la variables de session
	*/
	static function delete($key) {
	
		$_SESSION = Set::remove($_SESSION, $key);
		return (Session::check($key) == false);		
	}
	
	/**
	* 
	*Fonction chargée de détruire la variable de session
	*@see http://php.net/manual/fr/function.session-destroy.php
	*/
	static function destroy() {

		session_unset();
	
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		session_destroy();	
	}
	
	/**
	* 
	*Fonction chargée de vérifier qu'un chemin existe
	*/
	static function check($key) {
	
		if(empty($key)) { return false; } //Si la clée est vide
		$result = Set::classicExtract($_SESSION, $key); //On procède à l'extraction de la donnée
		return isset($result); //On retourne le résultat
	}
}