<h2>Gérer les commentaires</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"><input type="checkbox" id="checkall"/></th>
				<th scope="col" class="rounded center">Date</th>
				<th scope="col" class="rounded center">Auteur</th>
				<th scope="col" class="rounded center">Contenu</th>
				<th scope="col" class="rounded center">Article associé</th>
				<th scope="col" class="rounded center">Publié</th>
				<th scope="col" class="rounded-q4 center">Actions</th>
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
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td class="center"><?php echo date("d/m/Y", strtotime($aValue['created'])); ?></td>
				<td class="center"><?php echo ucfirst($authorList[$aValue['created_by']]); ?></td>
				<td class="center"><?php if(strlen($aValue['contenu'])>15){echo substr($aValue['contenu'], 0, 15).' ...';}else{echo $aValue['contenu'];} ?></td>
				<td class="center"><?php echo $articleList[$aValue['articles_id']]; ?></td>
				<td class="center">
					<?php if($aValue['online'] == 1) { ?>
						<a href="<?php echo BASE_URL.'/commentaires/publish/'.$aValue['id'].'/0'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/green.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } else { ?>
						<a href="<?php echo BASE_URL.'/commentaires/publish/'.$aValue['id'].'/1'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/red.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } ?>
				</td>
				<td class="center">
					<a href="<?php echo BASE_URL; ?>/commentaires/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="éditer" src="<?php echo BASE_URL;?>/img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/commentaires/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?>/img/intranet/site/article-delete.png"></a>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody> 
		<tfoot>
			<tr>
				<td colspan="6" class="rounded-foot-left">&nbsp;</td>
				<td class="rounded-foot-right">&nbsp;</td>
			</tr>
		</tfoot>
	</table>
	<?php echo $aControllerDatas['pagination']; ?>
	<button type="submit" onclick="return deleteComment();"><span>Supprimer</span></button>
</form>
