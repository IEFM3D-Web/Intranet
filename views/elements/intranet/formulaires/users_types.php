<?php 
if(isset($aControllerDatas['types'])) {$types = $aControllerDatas['types'];}else{$types = array();}

if(isset($aControllerDatas['crud'])){ $crud = $aControllerDatas['crud'];}

if(isset($aControllerDatas['types']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['types']));
}

echo form_input('name', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $types));
?>

<table id="rounded-corner">
	<thead class="top_users_types">
		<tr>
			<th class="rounded-company" scope="col">Module</th>
			<th>Create</th>
			<th>Read</th>
			<th>Update</th>
			<th>Delete</th>
			<th class="rounded-q4 center" scope="col">Publier</th>
		</tr>
	</thead> 
	<tbody class="align_checkbox">
		<tr>
			<td>Catégories</td>
			<td><?php echo form_input('crud[categories][add]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>	
			<td><?php echo form_input('crud[categories][index]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td><?php echo form_input('crud[categories][edit]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td><?php echo form_input('crud[categories][erase]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Articles</td>
			<td><?php echo form_input('crud[articles][add]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td><?php echo form_input('crud[articles][index]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td><?php echo form_input('crud[articles][edit]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td><?php echo form_input('crud[articles][erase]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
			<td><?php echo form_input('crud[articles][publish]', " ", array('type' => 'checkbox', 'values' => $types)); ?></td>
		</tr>
		<tr>
			<td>Commentaires</td>
			<td>
				-
			</td>
			<td>
				<input type="hidden" value="0" name="crud[commentaires][index]"/>
				<input type="checkbox" value="1" name="crud[commentaires][index]" <?php echo isset($crud['crud']['commentaires']['index']) && $crud['crud']['commentaires']['index'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[commentaires][edit]"/>
				<input type="checkbox" value="1" name="crud[commentaires][edit]" <?php echo isset($crud['crud']['commentaires']['edit']) && $crud['crud']['commentaires']['edit'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			
			<td>
				<input type="hidden" value="0" name="crud[commentaires][erase]"/>
				<input type="checkbox" value="1" name="crud[commentaires][erase]" <?php echo isset($crud['crud']['commentaires']['erase']) && $crud['crud']['commentaires']['erase'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[commentaires][publish]"/>
				<input type="checkbox" value="1" name="crud[commentaires][publish]" <?php echo isset($crud['crud']['commentaires']['publish']) && $crud['crud']['commentaires']['publish'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
		</tr>
		<tr>
			<td>Utilisateurs</td>
			<td>
				<input type="hidden" value="0" name="crud[users][add]"/>
				<input type="checkbox" value="1" name="crud[users][add]" <?php echo isset($crud['crud']['users']['add']) && $crud['crud']['users']['add'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users][liste]"/>
				<input type="checkbox" value="1" name="crud[users][liste]" <?php echo isset($crud['crud']['users']['liste']) && $crud['crud']['users']['liste'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users][edit]"/>
				<input type="checkbox" value="1" name="crud[users][edit]" <?php echo isset($crud['crud']['users']['edit']) && $crud['crud']['users']['edit'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users][erase]"/>
				<input type="checkbox" value="1" name="crud[users][erase]" <?php echo isset($crud['crud']['users']['erase']) && $crud['crud']['users']['erase'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				-
			</td>
		</tr>
		<tr>
			<td>Rôles</td>
			<td>
				<input type="hidden" value="0" name="crud[users_types][add]"/>
				<input type="checkbox" value="1" name="crud[users_types][add]" <?php echo isset($crud['crud']['users_types']['add']) && $crud['crud']['users_types']['add'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users_types][index]"/>
				<input type="checkbox" value="1" name="crud[users_types][index]" <?php echo isset($crud['crud']['users_types']['index']) && $crud['crud']['users_types']['index'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users_types][edit]"/>
				<input type="checkbox" value="1" name="crud[users_types][edit]"  <?php echo isset($crud['crud']['users_types']['edit']) && $crud['crud']['users_types']['edit'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				<input type="hidden" value="0" name="crud[users_types][erase]"/>
				<input type="checkbox" value="1" name="crud[users_types][erase]"  <?php echo isset($crud['crud']['users_types']['erase']) && $crud['crud']['users_types']['erase'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td>
				-
			</td>
		</tr>
	</tbody>
	<tfoot class="checkall">
		<tr>
			<td style="text-align:right; background-color:#e6e6e6" colspan="5">Tout séléctionner</td>
			<td style="background-color:#e6e6e6;"><input type="checkbox" id="checkall"/></td>
		</tr>
	</tfoot>
</table>
