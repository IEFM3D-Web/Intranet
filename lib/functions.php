<?php 
/**
 *Cette fonction permet de faire un print_r formaté
 *@param  mixed  $mVar2Display  élement à afficher
 *
 */
function pr($mVar2Display) {

	echo '<pre style="background-color: #EBEBEB; border: 1px dashed black; width: 100%; padding: 10px;">';
	print_r($mVar2Display);
	echo '</pre>';
}


function liste_Dirs($dir, $userPath) {

	$sourceFolder = str_replace('\\', '/', $dir);
	$sourceFolderTab = explode('/', $sourceFolder);
	$webrootIndex = array_search('webroot', $sourceFolderTab);
	$sourceFolderTab = array_slice ($sourceFolderTab, $webrootIndex + 1);
	
    $output = '<ul>';
    $dossier = opendir($dir);

	
    while(($item = readdir($dossier)))
    {
        $berk = array('.', '..'); // ne pas tenir compte de ses répertoires / fichiers
		$extension = recup_file_extension($item);
			
        if (!in_array($item, $berk))
        {
            $new_Dir = $dir.DS.$item;

            if(is_dir($new_Dir) && $item !== "_thumbs")
            {
				$is_empty = count(scandir($new_Dir));
				
				if($is_empty > 2){
				
                $output .= '<li class="doc"><img src="'.BASE_URL.'/img/intranet/site/icones/folder.png" class="icone"/>'.$item.'</li>';
                $output .= liste_Dirs($new_Dir, $userPath);
                $output .= '</li>';
				
				}
            }
			else if($item !== "_thumbs")
            {
			
				if(!file_exists(IMG.DS.'intranet'.DS.'site'.DS.'icones'.DS.$extension.'.png')){
					$extension = "default";
				}
				
                $output .= '<li class="fichier"><img src="'.BASE_URL.'/img/intranet/site/icones/'.$extension.'.png" class="icone"/><a href="'.BASE_URL.'/'.implode('/', $sourceFolderTab).'/'.$item.'" target="_blank">'.$item.'</a></li>';
            }
        }
    }

    $output .= '</ul>';

    return $output;
}

/**
 *Cette fonction permet de retourner le nom de l'extension du fichier passé en paramètre
 *@param  string  $filename  Nom du fichier
 *@return  string  $extension  Nom de l'extension
 */
function recup_file_extension($filename)
{
	$extension = explode('.', $filename);
	$extension = array_reverse($extension);
	$extension = $extension[0];

	if($extension == "jpg" || $extension == "gif" || $extension == "png"){
		$extension = "images";
	}
	
	else if($extension == "avi" || $extension == "mpeg4" || $extension == "wmv" || $extension == "mov" || $extension == "mkv"){
		$extension = "videos";
	}
	
    return $extension;
}
?>
