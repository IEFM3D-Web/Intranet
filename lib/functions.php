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


function liste_Dirs($dir)
{
    $output = '<ul>';
    $dossier = opendir($dir);

    while($item = readdir($dossier))
    {
        $berk = array('.', '..'); // ne pas tenir compte de ses répertoires / fichiers

        if (!in_array($item, $berk))
        {
            $new_Dir = $dir.'/'.$item;

            if(is_dir($new_Dir))
            {
                $output .= '<li><strong>'.$item.'</strong></li>';
                $output .= liste_Dirs($new_Dir);
                $output .= '</li>';
            }
            else
            {
                $output .= '<li>'.$item.'</li>';
            }
        }
    }

    $output .= '</ul>';

    return $output;
}
?>