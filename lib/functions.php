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

function directoryContent($directory) {
				
		$files = array();
		$dir = opendir($directory);
		
		while($file = readdir($dir)) {
			
			if($file != '.' && $file != '..' && $file != 'empty' && !is_dir($directory.$file)) {
				
				//$directory.$file
				$files[] = $file;
			} else {
			
				if(is_dir($directory.$file)){
					pr($directory.$file);
					//$files[$file] = directoryContent($directory.$file);
				}
			}
		}		
		closedir($dir);
		return $files;
}
?>