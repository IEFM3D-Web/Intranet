<?php 
if(isset($aControllerDatas['types'])) {$types = $aControllerDatas['types'];}else{$types = array();}

if(isset($aControllerDatas['crud'])){ $crud = $aControllerDatas['crud'];}

if(isset($aControllerDatas['types']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['types']));
}

echo form_input('name', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $types));
?>


<table id="rounded-corner">
	<thead>
		<tr>
			<th>Module</th>
			<th>Create</th>
			<th>Read</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead> 
	<tfoot class="align_checkall">
		<tr>
			<td colspan="4" class="rounded-foot-left">&nbsp;</td>
			<td class="rounded-foot-right"><input type="checkbox" id="checkall"/></td>
		</tr>
	</tfoot>
	<tbody class="align_checkbox">
		<tr>
			<td width="60%">Catégories</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[categories][add]"/>
				<input type="checkbox" value="1" name="crud[categories][add]" <?php echo isset($crud['crud']['categories']['add']) && $crud['crud']['categories']['add'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>	
			<td width="10%">
				<input type="hidden" value="0" name="crud[categories][index]"/>
				<input type="checkbox" value="1" name="crud[categories][index]" <?php echo isset($crud['crud']['categories']['index']) && $crud['crud']['categories']['index'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[categories][edit]"/>
				<input type="checkbox" value="1" name="crud[categories][edit]" <?php echo isset($crud['crud']['categories']['edit']) && $crud['crud']['categories']['edit'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[categories][erase]"/>
				<input type="checkbox" value="1" name="crud[categories][erase]" <?php echo isset($crud['crud']['categories']['erase']) && $crud['crud']['categories']['erase'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
		</tr>
		<tr>
			<td width="60%">Articles</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[articles][add]"/>
				<input type="checkbox" value="1" name="crud[articles][add]" <?php echo isset($crud['crud']['articles']['add']) && $crud['crud']['articles']['add'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[articles][liste]"/>
				<input type="checkbox" value="1" name="crud[articles][liste]" <?php echo isset($crud['crud']['articles']['liste']) && $crud['crud']['articles']['liste'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[articles][edit]"/>
				<input type="checkbox" value="1" name="crud[articles][edit]" <?php echo isset($crud['crud']['articles']['edit']) && $crud['crud']['articles']['edit'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[articles][erase]"/>
				<input type="checkbox" value="1" name="crud[articles][erase]" <?php echo isset($crud['crud']['articles']['erase']) && $crud['crud']['articles']['erase'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
		</tr>
		<tr>
			<td width="60%">Commentaires</td>
			<td width="10%">
				-
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[commentaires][index]"/>
				<input type="checkbox" value="1" name="crud[commentaires][index]" <?php echo isset($crud['crud']['commentaires']['index']) && $crud['crud']['commentaires']['index'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[commentaires][edit]"/>
				<input type="checkbox" value="1" name="crud[commentaires][edit]" <?php echo isset($crud['crud']['commentaires']['edit']) && $crud['crud']['commentaires']['edit'] == 1 ? 'checked="checked"' : ''; ?>/>
			</td>
			<td width="10%">
				<input type="hidden" value="0" name="crud[commentaires][erase]"/>
				<input type="checkbox" value="1" name="crud[commentaires][erase]" <?php echo isset($crud['crud']['commentaires']['erase']) && $crud['crud']['commentaires']['erase'] == 1 ? 'checked="checked"' : ''; ?>/>
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
		</tr>
	</tbody>
</table>
