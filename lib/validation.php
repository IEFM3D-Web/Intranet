<?php
class Validation {

/**
 * Some complex patterns needed in multiple places
 *
 * @var array
 * @access private
 */
	var $__pattern = array(
		'hostname' => '(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel)'
	);	
	
/**
 * Cette fonction va renvoyer une instance de la classe car en static $this n'est pas accessible
 *
 * @return object Instance de la classe Validation
 * @version 0.1 - 28/12/2011
 */	
	//function &getInstance() {
	function getInstance() {
		
		static $instance = array();
		//if(!$instance) { $instance[0] = &new Validation(); }
		if(!$instance) { $instance[0] = new Validation(); }
		return $instance[0];
	}	
	
/**
 * Cette fonction va lancer la règle de validation
 *
 * @param varchar $val Valeur à tester
 * @param mixed $rule Règle de validation à lancer
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function check($val, $rule) {
		
		//$_this = &Validation::getInstance(); //On va créer une instence de la classe car en static l'objet $this n'est pas accessible
		$_this = Validation::getInstance(); //On va créer une instence de la classe car en static l'objet $this n'est pas accessible
		
		//Si la règle est un tableau
		if(is_array($rule)) { 
			
			$function = $rule[0]; //On récupère la fonction qui sera toujours dans la première clée du tableau
			unset($rule[0]); //On la supprime la fonction du tableau de règle
			 
		} 
		else { $function = $rule; } //Sinon on affecte directement la fonction
		
		if(method_exists($_this, $function)) { //On teste si la méthode existe dans la classe
			
			$params = array_merge(array($val), $rule); //On génère une variable contenant les paramètres de la fonction
			return call_user_func_array(array($_this, $function), $params); //Et on retourne le résultat de la fonction
			
		} else { return false; }  //Si la méthode n'existe pas on génère une erreur
	}
	
/**
 * Cette fonction va contrôler que la valeur passée en paramètre n'est pas vide
 *
 * @param varchar $val Valeur à tester
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function notEmpty($val) { return !empty($val); }
	
/**
 * Cette fonction va contrôler que la valeur passée en paramètre n'est pas égale à la valeur de référence
 *
 * @param mixed $val Valeur à tester
 * @param mixed $ref Valeur de référence
 * @return boolean
 * @version 0.1 - 04/02/2011
 */
	static function notEqualsTo($val, $ref) { return $val != $ref; }	

/**
 * Cette fonction va contrôler que la valeur passée en paramètre est bien un email
 *
 * @param varchar $val Valeur à tester
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function email($val) { 

		$_this = Validation::getInstance(); //On va créer une instence de la classe car en static l'objet $this n'est pas accessible
		$regex = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@' . $_this->__pattern['hostname'] . '$/i';
		return preg_match($regex, $val) ? true : false; 
	}

/**
 * Cette fonction va contrôler que la valeur passée en paramètre ne contient que des lettres
 *
 * @param varchar $val Valeur à tester
 * @return boolean
 * @version 0.1 - 28/12/2011
 */		
	static function alphabetic($val) { return preg_match('/^([ÀÂÇÈÉÊËÎÏÔÙÛÜàâçèéêëîïôùûüa-zA-Z -]+)$/', $val) ? true : false; }

/**
 * Cette fonction va contrôler que la valeur passée en paramètre ne contient que des lettres et des chiffres
 *
 * @param varchar $val Valeur à tester
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function alphanumeric($val) { return preg_match('/^([ÀÂÇÈÉÊËÎÏÔÙÛÜàâçèéêëîïôùûüa-zA-Z0-9 -]+)$/', $val) ? true : false; }

/**
 * Cette fonction va contrôler que la valeur passée en paramètre ne contient que des nombres
 *
 * @param varchar $val Valeur à tester
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function numeric($val) { return is_numeric($val); }

/**
 * Cette fonction va contrôler que la valeur passée en paramètre ne contient pas plus de x caractères ou n'est pas supérieur à x
 *
 * @param mixed $val Valeur à tester
 * @param integer $x Longueur maximale possible
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function maxLength($val, $x) {
		
		if(is_int($val)) return ($val > $x) ? false : true; //Si c'est un entier il ne doit pas être supérieur $x
		else if(is_string($val)) return (strlen($val) > $x) ? false : true; //Si c'est une chaine de caractères elle ne doit pas contenir plus de $x caractères
	}

/**
 * Cette fonction va contrôler que la valeur passée en paramètre ne contient pas moins de x caractères ou n'est pas inférieure à x
 *
 * @param mixed $val Valeur à tester
 * @param integer $x Longueur minimale possible
 * @return boolean
 * @version 0.1 - 28/12/2011
 */		
	static function minLength($val, $x) {
		
		if(is_int($val)) return ($val < $x) ? false : true; //Si c'est un entier il ne doit pas être inférieur $x
		else if(is_string($val)) return (strlen($val) < $x) ? false : true; //Si c'est une chaine de caractères elle ne doit pas contenir mois de $x caractères
	}
	
/**
 * Cette fonction va contrôler que la valeur passée en paramètre est comprise entre les valeurs de la variable $range
 *
 * @param mixed $val Valeur à tester
 * @param integer $min Valeur minimum
 * @param integer $max Valeur maximum
 * @return boolean
 * @version 0.1 - 28/12/2011
 */	
	static function between($val, $min, $max) {
		
		if(is_int($val)) return ($val < $min || $val > $max) ? false : true;
		else if(is_string($val)) return (strlen($val) < $min || strlen($val) > $max) ? false : true;
	}
	
/**
 * Cette fonction va contrôler que la valeur passée en paramètre est conforme à l'expression régulière
 *
 * @param varchar $val Valeur à tester
 * @param varchar $regex expression régulière
 * @return boolean
 * @version 0.1 - 28/12/2011
 */		
	static function custom($val, $regex) { return (!preg_match($regex, $val)) ? false : true; }

/**
 * Checks that a value is a valid URL according to http://www.w3.org/Addressing/URL/url-spec.txt
 *
 * The regex checks for the following component parts:
 *
 * - a valid, optional, scheme
 * - a valid ip address OR
 *   a valid domain name as defined by section 2.3.1 of http://www.ietf.org/rfc/rfc1035.txt
 *   with an optional port number
 * - an optional valid path
 * - an optional query string (get parameters)
 * - an optional fragment (anchor tag)
 *
 * @param string $check Value to check
 * @param boolean $strict Require URL to be prefixed by a valid scheme (one of http(s)/ftp(s)/file/news/gopher)
 * @return boolean Success
 * @access public
 * @version 0.1 - 29/12/2011
 */	
	static function url($val, $strict = false) {
		
		$_this = Validation::getInstance();
		$_this->__populateIp();
		$validChars = '([' . preg_quote('!"$&\'()*+,-.@_:;=~') . '\/0-9a-z\p{L}\p{N}]|(%[0-9a-f]{2}))';
		
		$regex = 
			'/^(?:(?:https?|ftps?|file|news|gopher):\/\/)' . (!empty($strict) ? '' : '?') .
			'(?:' . $_this->__pattern['IPv4'] . '|\[' . $_this->__pattern['IPv6'] . '\]|' . $_this->__pattern['hostname'] . ')' .
			'(?::[1-9][0-9]{0,4})?' .
			'(?:\/?|\/' . $validChars . '*)?' .
			'(?:\?' . $validChars . '*)?' .
			'(?:#' . $validChars . '*)?$/iu';
		
		return preg_match($regex, $val) ? true : false;
	}	
	
	/*static function callback ($sValue, $mCallback) {
		
		if(is_array ($mCallback)) {
			if (method_exists ($mCallback[0], $mCallback[1])) {
				return call_user_func ($mCallback, $sValue);
			}
			else
				return false;
		}
		else
			return $mCallback ($sValue);
	}*/
	
/*
 * Lazily popualate the IP address patterns used for validations
 *
 * @return void
 * @access private
 */
	function __populateIp() {
		
		if (!isset($this->__pattern['IPv6'])) {
			$pattern  = '((([0-9A-Fa-f]{1,4}:){7}(([0-9A-Fa-f]{1,4})|:))|(([0-9A-Fa-f]{1,4}:){6}';
			$pattern .= '(:|((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})';
			$pattern .= '|(:[0-9A-Fa-f]{1,4})))|(([0-9A-Fa-f]{1,4}:){5}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})';
			$pattern .= '(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:)';
			$pattern .= '{4}(:[0-9A-Fa-f]{1,4}){0,1}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2}))';
			$pattern .= '{3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:){3}(:[0-9A-Fa-f]{1,4}){0,2}';
			$pattern .= '((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|';
			$pattern .= '((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:){2}(:[0-9A-Fa-f]{1,4}){0,3}';
			$pattern .= '((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2}))';
			$pattern .= '{3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:)(:[0-9A-Fa-f]{1,4})';
			$pattern .= '{0,4}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)';
			$pattern .= '|((:[0-9A-Fa-f]{1,4}){1,2})))|(:(:[0-9A-Fa-f]{1,4}){0,5}((:((25[0-5]|2[0-4]';
			$pattern .= '\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4})';
			$pattern .= '{1,2})))|(((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})))(%.+)?';

			$this->__pattern['IPv6'] = $pattern;
		}
		if (!isset($this->__pattern['IPv4'])) {
			$pattern = '(?:(?:25[0-5]|2[0-4][0-9]|(?:(?:1[0-9])?|[1-9]?)[0-9])\.){3}(?:25[0-5]|2[0-4][0-9]|(?:(?:1[0-9])?|[1-9]?)[0-9])';
			$this->__pattern['IPv4'] = $pattern;
		}
	}	
}