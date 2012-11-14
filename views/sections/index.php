<h2>Gérer les sections</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"><input type="checkbox" id="checkall"/></th>
				<th scope="col" class="rounded fixed-width">Nom</th>
				<th scope="col" class="rounded-q4">Actions</th>
			</tr> 
		</thead> 
		<tfoot>
			<tr>
				<td colspan="2" class="rounded-foot-left">&nbsp;</td>
				<td class="rounded-foot-right">&nbsp;</td>
			</tr>
		</tfoot>
		<tbody>
			 <?php
				foreach($aControllerDatas['sections'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td><?php echo $aValue['name']; ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/sections/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="éditer" src="<?php echo BASE_URL;?>/img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/sections/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?>/img/intranet/site/article-delete.png"></a>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<?php echo $aControllerDatas['pagination']; ?>
	<button type="submit" onclick="return deleteCategory();"><span>Supprimer</span></button>
</form>