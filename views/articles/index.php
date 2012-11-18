<?php 
$authorList = $aControllerDatas['authorList'];
$articlesTypesList = $aControllerDatas['articlesTypesList'];
$nbComments = $aControllerDatas['nbComments'];

foreach($aControllerDatas['articles'] as $iKey => $aValue) {
?>
<div class="article">
	<div id="article_header">
		<div class="name"><?php echo '<a href="'.BASE_URL.'/articles/view_article/'.$aValue['id'].'">'.ucfirst($aValue['titre']).'</a>'; ?></div>
		<div class="top_art">
			<div>
				<?php echo date("d/m/Y", strtotime($aValue['created'])); ?> |
				<?php echo '<a href="'.BASE_URL.'/articles/view_article/'.$aValue['id'].'">';?>Commentaires (<?php echo $nbComments[$aValue['id']]; ?>)</a> | par
				<?php echo ucfirst($authorList[$aValue['created_by']]); ?> | tags
				<?php echo ucfirst($articlesTypesList[$aValue['articles_type_id']]); ?>
			</div>
		</div>
	</div>
	<div class="separe"></div>
	<div class="clear"></div>
	<div class="contenu"><?php echo $aValue['chapeau']; ?></div>
	<div class="clear"></div>
</div>
<?php
}
?>

<?php
	echo $aControllerDatas['pagination'];
?>