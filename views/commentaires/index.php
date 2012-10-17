<h2>Gérer les commentaires</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"><input type="checkbox" id="checkall"/></th>
				<th scope="col" class="rounded">Date</th>
				<th scope="col" class="rounded">Auteur</th>
				<th scope="col" class="rounded">contenu</th>
				<th scope="col" class="rounded">Article associé</th>
				<th scope="col" class="rounded">Publié</th>
				<th scope="col" class="rounded-q4">Actions</th>
			</tr> 
		</thead> 
		<tfoot>
			<tr>
				<td colspan="6" class="rounded-foot-left">&nbsp;</td>
				<td class="rounded-foot-right">&nbsp;</td>
			</tr>
		</tfoot>
		<tbody>
			 <?php
				$authorList = $aControllerDatas['authorList'];
				$articleList = $aControllerDatas['articleList'];
;				foreach($aControllerDatas['commentaires'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></td>
				<td><?php echo ucfirst($authorList[$aValue['created_by']]); ?></td>
				<td><?php if(strlen($aValue['contenu'])>15){echo substr($aValue['contenu'], 0, 15).' ...';}else{echo $aValue['contenu'];} ?></td>
				<td><?php echo $articleList[$aValue['articles_id']]; ?></td>
				<td><?php if($aValue['online'] == 1){echo '<img src="'.BASE_URL.'/img/intranet/site/green.png" alt="Oui" title="Oui"/>';}else{echo '<img src="'.BASE_URL.'/img/intranet/site/red.png" alt="Non" title="Non"/>';} ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/commentaires/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="éditer" src="<?php echo BASE_URL;?> /img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/commentaires/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?> /img/intranet/site/article-delete.png"></a>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<?php echo $aControllerDatas['pagination']; ?>
	<br />
	<button type="submit"><span>Supprimer</span></button>
</form>
