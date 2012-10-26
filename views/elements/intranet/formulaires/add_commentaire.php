<?php 
echo form_input('color', '', array('type' => 'hidden', 'values' => array('color' => $_SESSION['couleur'])));
echo form_input('articles_id', '', array('type' => 'hidden', 'values' => array('articles_id' => $aControllerDatas['articles']['id'])));
echo form_input('contenu', "Ajouter un commentaire", array('type' => 'textarea','class' => 'textarea-commentaire', 'errors' => $aControllerDatas['errors'], 'wysiwyg' => false,
'rows' =>80, 'cols' =>10));
?>
