<?php 
if(isset($aControllerDatas['types'])) {$types = $aControllerDatas['types'];}else{$types = array();}
if(isset($aControllerDatas['crud'])){ $crud = $aControllerDatas['crud'];}
echo form_input('name', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $types));
?>
<div id="tableBox">
<table id="rounded-corner">
	<thead class="top_users_types">
		<tr>
			<th class="rounded-company" scope="col">Module</th>
			<th>Create</th>
			<th>Read</th>
			<th>Update</th>
			<th>Delete</th>
			<th>Publier</th>
			<th class="rounded-q4 center" scope="col">Upload</th>
		</tr>
	</thead> 
	<tbody class="align_checkbox">
	<?php
	if(isset($aControllerDatas['types']['id'])){
		echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['types']));
	?>
		<tr>
			<td>Catégories</td>
			<td><?php echo form_input('crud[categories][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['categories']['add'])); ?></td>	
			<td><?php echo form_input('crud[categories][index]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['categories']['index'])); ?></td>
			<td><?php echo form_input('crud[categories][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['categories']['edit'])); ?></td>
			<td><?php echo form_input('crud[categories][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['categories']['erase'])); ?></td>
			<td> - </td>
			<td> - </td>
		</tr>
		<tr>
			<td>Articles</td>
			<td><?php echo form_input('crud[articles][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['add'])); ?></td>
			<td><?php echo form_input('crud[articles][liste]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['liste'])); ?></td>
			<td><?php echo form_input('crud[articles][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['edit'])); ?></td>
			<td><?php echo form_input('crud[articles][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['erase'])); ?></td>
			<td><?php echo form_input('crud[articles][publish]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['publish'])); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Commentaires</td>
			<td> - </td>
			<td><?php echo form_input('crud[commentaires][index]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['index'])); ?></td>
			<td><?php echo form_input('crud[commentaires][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['edit'])); ?></td>
			<td><?php echo form_input('crud[commentaires][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['erase'])); ?></td>
			<td><?php echo form_input('crud[commentaires][publish]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['publish'])); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Utilisateurs</td>
			<td><?php echo form_input('crud[users][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['add'])); ?></td>
			<td><?php echo form_input('crud[users][liste]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['liste'])); ?></td>
			<td><?php echo form_input('crud[users][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['edit'])); ?></td>
			<td><?php echo form_input('crud[users][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['erase'])); ?></td>
			<td><?php echo form_input('crud[users][publish]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['publish'])); ?></td>
			<td><?php echo form_input('crud[users][upload]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['upload'])); ?></td>
		</tr>
		<tr>
			<td>Rôles</td>
			<td><?php echo form_input('crud[users_types][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['add'])); ?></td>
			<td><?php echo form_input('crud[users_types][index]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['index'])); ?></td>
			<td><?php echo form_input('crud[users_types][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['edit'])); ?></td>
			<td><?php echo form_input('crud[users_types][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['erase'])); ?></td>
			<td> - </td>
			<td> - </td>
		</tr>
		<tr>
			<td>Sections</td>
			<td><?php echo form_input('crud[sections][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['sections']['add'])); ?></td>
			<td><?php echo form_input('crud[sections][index]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['sections']['index'])); ?></td>
			<td><?php echo form_input('crud[sections][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['sections']['edit'])); ?></td>
			<td><?php echo form_input('crud[sections][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['sections']['erase'])); ?></td>
			<td> - </td>
			<td> - </td>
		</tr>
	<?php			
	}else{
	?>
		<tr>
			<td>Catégories</td>
			<td><?php echo form_input('crud[categories][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>	
			<td><?php echo form_input('crud[categories][index]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[categories][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[categories][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
			<td> - </td>
		</tr>
		<tr>
			<td>Articles</td>
			<td><?php echo form_input('crud[articles][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[articles][liste]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[articles][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[articles][erase]', " ", array('type' => 'checkbox', 'values' =>'')); ?></td>
			<td><?php echo form_input('crud[articles][publish]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Commentaires</td>
			<td> - </td>
			<td><?php echo form_input('crud[commentaires][index]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[commentaires][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[commentaires][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[commentaires][publish]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Utilisateurs</td>
			<td><?php echo form_input('crud[users][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][liste]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][publish]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][upload]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
		</tr>
		<tr>
			<td>Rôles</td>
			<td><?php echo form_input('crud[users_types][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users_types][index]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users_types][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users_types][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
			<td> - </td>
		</tr>
		<tr>
			<td>Sections</td>
			<td><?php echo form_input('crud[sections][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[sections][index]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[sections][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[sections][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
			<td> - </td>
		</tr>
	<?php
	}
	?>

	</tbody>
	<tfoot>
		<tr>
			<td colspan="7" class="foot">
				<span class="left"><input type="checkbox" id="checkall"/>Tout sélectionner</span>
			</td>
		</tr>
	</tfoot>
</table>
</div>