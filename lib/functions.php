<?php 
/**
 *Cette fonction permet de faire un print_r formaté
 *@param  mixed  $mVar2Display  élement à afficher
 */
function pr($mVar2Display) {

	echo '<pre style="background-color: #EBEBEB; border: 1px dashed black; width: 100%; padding: 10px;">';
	print_r($mVar2Display);
	echo '</pre>';
}
?>