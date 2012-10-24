<?php 
$article = $aControllerDatas['articles'];
$authorList = $aControllerDatas['authorList'];
$commentaires = $aControllerDatas['commentaires'];
?>
<h2><?php echo ucfirst($article['titre']); ?></h2>

<?php 
$articlesTypesList = $aControllerDatas['articlesTypesList'];
?>

<div class="info_cat"><?php echo ucfirst($articlesTypesList[$article['articles_type_id']]) ?></div>
<div class="info_dat">Date : <?php echo $article['created'] ?></div>
<div class="info_aut"><?php echo ucfirst($authorList[$article['created_by']])?></div>





<div class="view_article">
	<?php echo $article['contenu']; ?>
</div>

<?php

foreach($commentaires as $aValue){

?>
<div class="commentaire_<?php echo $aValue['color']; ?>">
	<div class="commentaire-top">Par <?php echo ucfirst($authorList[$aValue['created_by']]); ?> le <?php echo date("d/m/Y", strtotime($aValue['created'])); ?></div>
	<div class="contenu"><?php echo $aValue['contenu']; ?></div>
</div>
<?php
/*
$idAuthor = ($aValue['created_by']);}
$parametres = array(
	'table' => '',
)
*/
}
?>

<?php

if(count($commentaires) == 0){
?>
	<div class="commentaire">
		Il n'y a aucun commentaire.
	</div>
<?php	
}
echo $aControllerDatas['pagination'];
?>
<div class="add-commentaire">
	<?php 
	echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
		include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'add_commentaire.php'); 
		if($aControllerDatas['success_comment']){
		?>
			<div class="valid_box">
				Votre commentaire est en attente de validation.
			</div>
		<?php
		};
	echo form_close();
	?>
</div>

