<?php 
$authorList = $aControllerDatas['authorList'];
$articlesTypesList = $aControllerDatas['articlesTypesList'];

foreach($aControllerDatas['articles'] as $iKey => $aValue) {
?>
<div class="article">
	<div id="article_header">
		<div class="name"><?php echo '<a href="'.BASE_URL.'/articles/view_article/'.$aValue['id'].'">'.ucfirst($aValue['titre']).'</a>'; ?></div>
		<div class="top_art">
			<div class="date"><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></div>
			<div class="categorie"><?php echo ucfirst($articlesTypesList[$aValue['articles_type_id']]); ?></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="contenu"><?php echo $aValue['contenu']; ?></div>
	<div id="article_footer">
		<div class="auteur"><?php echo ucfirst($authorList[$aValue['created_by']]); ?></div>
		<div>
			<?php echo '<a href="'.BASE_URL.'/articles/view_article/'.$aValue['id'].'">';?>Commentaires (<?php echo get_nb_comments($aValue['id']); ?>)</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
}
?>

<?php
	echo $aControllerDatas['pagination'];
?>