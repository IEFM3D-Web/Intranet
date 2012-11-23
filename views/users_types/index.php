<h2>Gérer les rôles</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company fixed-width">Nom</th>
				<th scope="col" class="rounded center">Actions</th>
				<th scope="col" class="rounded-q4 center"><input type="checkbox" id="checkall"/></th>
			</tr> 
		</thead> 
		<tbody>
			 <?php
				foreach($aControllerDatas['types'] as $iKey => $aValue) {
			?>
			<tr>
				<td class="text"><?php echo ucfirst($aValue['name']); ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/users_types/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="modifier" src="<?php echo BASE_URL;?>/img/intranet/site/article-edit.png"></a>
					
					<?php 
					if($aValue['id']>4){
					?>
						&nbsp;
						<a href="<?php echo BASE_URL; ?>/users_types/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?>/img/intranet/site/article-delete.png"></a>
					<?php
					}
					?>
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
				<td colspan="3" class="foot">
					<?php 
					echo $aControllerDatas['pagination']; 
					echo form_input('Supprimer','',array('type' => 'submit', 'class' => 'button small red', 'onclick' => 'return deleteRole();'));
					?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>