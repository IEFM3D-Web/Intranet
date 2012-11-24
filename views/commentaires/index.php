<h2>Gérer les commentaires</h2>
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
				<th scope="col" class="rounded center">Date</th>
				<th scope="col" class="rounded center">Auteur</th>
				<th scope="col" class="rounded center">Contenu</th>
				<th scope="col" class="rounded center">Article associé</th>
				<th scope="col" class="rounded center">Actions</th>
				<th scope="col" class="rounded-q4 center"><input type="checkbox" id="checkall"/></th>
			</tr> 
		</thead>
		<tbody>
			 <?php
				$authorList = $aControllerDatas['authorList'];
				$articleList = $aControllerDatas['articleList'];
;				foreach($aControllerDatas['commentaires'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<?php if($aValue['online'] == 1) { ?>
						<a href="<?php echo BASE_URL.'/commentaires/publish/'.$aValue['id'].'/0'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/green.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } else { ?>
						<a href="<?php echo BASE_URL.'/commentaires/publish/'.$aValue['id'].'/1'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/red.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } ?>
				</td>
				<td class="text"><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></td>
				<td class="text"><?php echo ucfirst($authorList[$aValue['created_by']]); ?></td>
				<td class="text"><?php if(strlen($aValue['contenu'])>15){echo substr($aValue['contenu'], 0, 15).' ...';}else{echo $aValue['contenu'];} ?></td>
				<td class="text"><?php echo $articleList[$aValue['articles_id']]; ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/commentaires/edit/<?php echo $aValue['id']; ?>" class="tooltip" title="Éditer"><img alt="éditer" src="<?php echo BASE_URL;?>/img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/commentaires/erase/<?php echo $aValue['id']; ?>" class="ask tooltip" title="Supprimer"><img alt="supprimer" src="<?php echo BASE_URL;?>/img/intranet/site/article-delete.png"></a>
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
					echo form_input('Supprimer','',array('type' => 'submit', 'class' => 'button small red', 'onclick' => 'return deleteComment();'));
					?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
