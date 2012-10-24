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


function liste_Dirs($dir, $userPath)
{

	$sourceFolder = str_replace('\\', '/', $dir);
	$sourceFolderTab = explode('/', $sourceFolder);
	$webrootIndex = array_search('webroot', $sourceFolderTab);
	$sourceFolderTab = array_slice ($sourceFolderTab, $webrootIndex + 1);
	
    $output = '<ul>';
    $dossier = opendir($dir);

    while($item = readdir($dossier))
    {
        $berk = array('.', '..'); // ne pas tenir compte de ses répertoires / fichiers

        if (!in_array($item, $berk))
        {
            $new_Dir = $dir.DS.$item;

            if(is_dir($new_Dir))
            {
                $output .= '<li class="doc">'.$item.'</li>';
                $output .= liste_Dirs($new_Dir, $userPath);
                $output .= '</li>';
            }
            else
            {
                $output .= '<li class="fichier"><a href="'.BASE_URL.'/'.implode('/', $sourceFolderTab).'/'.$item.'" target="_blank">'.$item.'</a></li>';
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

    return $extension;
}
?>