<h2>Gérer les articles</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"><input type="checkbox" id="checkall"/></th>
				<th scope="col" class="rounded center">Titre</th>
				<th scope="col" class="rounded center">Création</th>
				<th scope="col" class="rounded center">Auteur</th>
				<th scope="col" class="rounded center">Catégorie</th>
				<th scope="col" class="rounded center">Publié</th>
				<th scope="col" class="rounded-q4 center">Actions</th>
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
				$articlesTypesList = $aControllerDatas['articlesTypesList'];
				foreach($aControllerDatas['articles'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td class="center"><?php if(strlen($aValue['titre'])>15){echo substr(ucfirst($aValue['titre']), 0, 15).' ...';}else{echo ucfirst($aValue['titre']);} ?></td>
				<td class="center"><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></td>
				<td class="center"><?php echo ucfirst($authorList[$aValue['created_by']]); ?></td>
				<td class="center"><?php echo $articlesTypesList[$aValue['articles_type_id']]; ?></td>
				<td class="center">
					<?php if($aValue['online'] == 1) { ?>
						<a href="<?php echo BASE_URL.'/articles/publish/'.$aValue['id'].'/0'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/green.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } else { ?>
						<a href="<?php echo BASE_URL.'/articles/publish/'.$aValue['id'].'/1'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/red.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } ?>
				</td>
				<td class="center">
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
	<button type="submit" onclick="return deleteArticle();"><span>Supprimer</span></button>
</form>
