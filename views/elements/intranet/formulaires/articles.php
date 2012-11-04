<?php 
if(isset($aControllerDatas['articles'])) {$articles = $aControllerDatas['articles'];}else{$articles = array();} 

if(isset($aControllerDatas['articles']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['articles']));
}

echo form_input('titre', "Titre", array('errors' => $aControllerDatas['errors'], 'values' => $articles));

echo '<div class="titre_wysi">Chapeau</div>';
echo form_input('chapeau', "", array('type' => 'textarea', 'errors' => $aControllerDatas['errors'], 'values' => $articles, 'wysiwyg' => true,
'rows' =>80, 'cols' =>10));

echo '<div class="titre_wysi">Contenu</div>';
echo form_input('contenu', "", array('type' => 'textarea', 'errors' => $aControllerDatas['errors'], 'values' => $articles, 'wysiwyg' => true,
'rows' =>80, 'cols' =>10));

echo form_input('articles_type_id','Catégorie', array('type'=>'select', 'errors'=>$aControllerDatas['errors'],
'values' => $articles, 'datas' => $aControllerDatas['articlesTypesList']));

echo form_input('online', "Publiée", array('type' => 'checkbox', 'errors' => $aControllerDatas['errors'], 'values' => $articles, 'label_bis' => 'En ligne'));
?>