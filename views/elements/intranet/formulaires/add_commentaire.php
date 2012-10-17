<?php 

echo form_input('contenu', "Ajouter un commentaire", array('type' => 'textarea', 'errors' => $aControllerDatas['errors'], 'values' => $commentaires, 'wysiwyg' => false,
'rows' =>80, 'cols' =>10));
?>
<input type="hidden" name="articles_id" value="<?php echo $aControllerDatas['articles']['id']; ?>"/>