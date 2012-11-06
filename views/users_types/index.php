<h2>Gérer les rôles</h2>
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
				foreach($aControllerDatas['types'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td><?php echo ucfirst($aValue['name']); ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/users_types/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="modifier" src="<?php echo BASE_URL;?> /img/intranet/site/article-edit.png"></a>
					
					<?php 
					if($aValue['id']>4){
					?>
						&nbsp;
						<a href="<?php echo BASE_URL; ?>/users_types/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?> /img/intranet/site/article-delete.png"></a>
					<?php
					}
					?>
				</td>
			</tr>
			<?php
			}
			?>
	</table>
	<?php echo $aControllerDatas['pagination']; ?>
	<br />
	<button type="submit" onclick="return deleteRole();"><span>Supprimer</span></button>
</form>