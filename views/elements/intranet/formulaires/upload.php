<?php 
echo form_input('file', "Fichier", array('type' => 'file', 'errors' => $aControllerDatas['errors']));
?>
<div id="tableBox">
<table border=1>
<?php
foreach($aControllerDatas['sections_users'] as $k => $v){
			
	echo '<tr><th>'.$aControllerDatas['sections_liste'][$k].'</th></tr>';
	
	foreach($aControllerDatas['sections_users'][$k] as $key => $value){
	
		echo '<tr><td>'.form_input($value['folder'], " ", array('type' => 'checkbox', 'values' => '', 'hidden' => false)).'</td><td>'.$value['prenom'].' '. $value['nom'].'</td></tr>';
	}
}
?>
</table>
</div>