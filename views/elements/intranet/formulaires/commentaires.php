<?php 
if(isset($aControllerDatas['commentaires'])) {$commentaires = $aControllerDatas['commentaires'];}else{$commentaires = array();} 

if(isset($aControllerDatas['commentaires']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['commentaires']));
}

echo form_input('contenu', "Contenu", array('type' => 'textarea', 'errors' => $aControllerDatas['errors'], 'values' => $commentaires, 'wysiwyg' => false,
'rows' =>80, 'cols' =>10));

echo form_input('online', "Publiée", array('type' => 'checkbox', 'errors' => $aControllerDatas['errors'], 'values' => $commentaires, 'label_bis' => 'En ligne'));
?>