<h2>Gérer les articles</h2>
<?php
//On test si il y a des messages de succès à afficher
if(Session::check('success')){
?>
	<div class="success message">
		<p><?php echo Session::read('success');?></p>
	</div>
<?php
	//On détruit le message de succès une fois qu'il a été affiché
	Session::delete('success');
}
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company">Publié</th>
				<th scope="col" class="rounded center">Titre</th>
				<th scope="col" class="rounded center">Création</th>
				<th scope="col" class="rounded center">Auteur</th>
				<th scope="col" class="rounded center">Catégorie</th>
				<th scope="col" class="rounded center">Actions</th>
				<th scope="col" class="rounded-q4 center"><input type="checkbox" id="checkall"/></th>
			</tr> 
		</thead> 
		<tbody>
			 <?php
				$authorList = $aControllerDatas['authorList'];
				$articlesTypesList = $aControllerDatas['articlesTypesList'];
				foreach($aControllerDatas['articles'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<?php if($aValue['online'] == 1) { ?>
						<a href="<?php echo BASE_URL.'/articles/publish/'.$aValue['id'].'/0'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/green.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } else { ?>
						<a href="<?php echo BASE_URL.'/articles/publish/'.$aValue['id'].'/1'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/red.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } ?>
				</td>
				<td class="text"><?php if(strlen($aValue['titre'])>15){echo substr(ucfirst($aValue['titre']), 0, 15).' ...';}else{echo ucfirst($aValue['titre']);} ?></td>
				<td class="text"><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></td>
				<td class="text"><?php echo ucfirst($authorList[$aValue['created_by']]); ?></td>
				<td class="text"><?php echo $articlesTypesList[$aValue['articles_type_id']]; ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/articles/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="éditer" src="<?php echo BASE_URL;?>/img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/articles/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?>/img/intranet/site/article-delete.png"></a>
				</td>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7" class="foot">
					<?php 
					echo $aControllerDatas['pagination']; 
					echo form_input('Supprimer','',array('type' => 'submit', 'class' => 'button small red', 'onclick' => 'return deleteArticle();'));
					?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
