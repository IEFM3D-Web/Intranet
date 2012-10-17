<?php 
/**
 *
 * @param mixed $a Css à insérer
 */
function css($a) {

	foreach($a as $k => $v) {
		
		echo '<link rel="stylesheet" type="text/css" href="'.BASE_URL.'/css/'.$v.'.css" />';
	}
}

/**
 *
 * @param mixed $a Js à insérer
 */
function js($a) {

	foreach($a as $k => $v) {

		echo '<script src="'.BASE_URL.'/js/'.$v.'.js"></script>';
	}
}
?>