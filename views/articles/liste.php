<h2>Gérer les articles</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"><input type="checkbox" id="checkall"/></th>
				<th scope="col" class="rounded">#</th>
				<th scope="col" class="rounded">Titre</th>
				<th scope="col" class="rounded">Création</th>
				<th scope="col" class="rounded">Auteur</th>
				<th scope="col" class="rounded">Catégorie</th>
				<th scope="col" class="rounded">Publié</th>
				<th scope="col" class="rounded-q4">Actions</th>
			</tr> 
		</thead> 
		<tfoot>
			<tr>
				<td colspan="7" class="rounded-foot-left">&nbsp;</td>
				<td class="rounded-foot-right">&nbsp;</td>
			</tr>
		</tfoot>
		<tbody>
			 <?php
				$authorList = $aControllerDatas['authorList'];
				$articlesTypesList = $aControllerDatas['articlesTypesList'];
				foreach($aControllerDatas['articles'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td><?php echo $aValue['id']; ?></td>
				<td><?php if(strlen($aValue['titre'])>15){echo substr(ucfirst($aValue['titre']), 0, 15).' ...';}else{echo ucfirst($aValue['titre']);} ?></td>
				<td><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></td>
				<td><?php echo ucfirst($authorList[$aValue['created_by']]); ?></td>
				<td><?php echo $articlesTypesList[$aValue['articles_type_id']]; ?></td>
				<td><?php if($aValue['online'] == 1){echo '<img src="'.BASE_URL.'/img/intranet/site/green.png" alt="Oui" title="Oui"/>';}else{echo '<img src="'.BASE_URL.'/img/intranet/site/red.png" alt="Non" title="Non"/>';} ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/articles/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="éditer" src="<?php echo BASE_URL;?> /img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/articles/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?> /img/intranet/site/article-delete.png"></a>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<?php echo $aControllerDatas['pagination']; ?>
	<button type="submit" class="ask"><span>Supprimer</span></button>
</form>
