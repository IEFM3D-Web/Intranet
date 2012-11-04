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
<div class="commentaire">
	<div class="commentaire-top <?php echo $aValue['color']; ?>">Par <?php echo ucfirst($authorList[$aValue['created_by']]); ?> le <?php echo date("d/m/Y", strtotime($aValue['created'])); ?></div>
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
}else{
	echo $aControllerDatas['pagination'];
}
?>
<div class="add-commentaire">
	<?php 
	if(isset($aControllerDatas['errors']) && !empty($aControllerDatas['errors'])){
	?>
		<script>
		$(document).ready(function(){
					
				 $('html, body').animate({ scrollTop: 800 }, 'slow'); 
			
		});       
		</script>
	<?php	
	}
	
	if(isset($aControllerDatas['notification'])){

	if($aControllerDatas['notification'] == 'success'){
		?>
		<script>
		$(document).ready(function(){
					
			 $('html, body').animate({ scrollTop: 800 }, 'slow'); 
				
			 //Affichage des notifications
			 for(var i=0;i<myMessages.length;i++)
			 {
				showMessage(myMessages[i]);
			 }
			 
			 //On cache les notifications au click
			 $('.message').click(function(){			  
					  $(this).slideUp();
			  });		 
				 
		});       
		</script>
		<div class="success message">
			<p>Votre commentaire est en attente de validation.</p>
		</div>
		<?php
	}
}
	echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
		include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'add_commentaire.php'); 
	echo form_close();
	?>
</div>

