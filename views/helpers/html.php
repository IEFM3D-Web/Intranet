<?php 
/**
*
*Classe statique permettant la gestion des sessions
*/
class Html{

	/**
	*
	* @param mixed $a Css à insérer
	*/
	static function css($a) {

		foreach($a as $k => $v) {
			
			echo '<link rel="stylesheet" type="text/css" href="'.BASE_URL.'/css/'.$v.'.css" />';
		}
	}

	/**
	*
	* @param mixed $a Js à insérer
	*/
	static function js($a) {

		foreach($a as $k => $v) {

			echo '<script src="'.BASE_URL.'/js/'.$v.'.js"></script>';
		}
	}
}

?>