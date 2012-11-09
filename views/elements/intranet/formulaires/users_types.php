<?php 
if(isset($aControllerDatas['types'])) {$types = $aControllerDatas['types'];}else{$types = array();}
if(isset($aControllerDatas['crud'])){ $crud = $aControllerDatas['crud'];}
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
			<th class="rounded-q4 center" scope="col">Publier</th>
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
		</tr>
		<tr>
			<td>Articles</td>
			<td><?php echo form_input('crud[articles][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['add'])); ?></td>
			<td><?php echo form_input('crud[articles][liste]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['liste'])); ?></td>
			<td><?php echo form_input('crud[articles][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['edit'])); ?></td>
			<td><?php echo form_input('crud[articles][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['erase'])); ?></td>
			<td><?php echo form_input('crud[articles][publish]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['articles']['publish'])); ?></td>
		</tr>
		<tr>
			<td>Commentaires</td>
			<td> - </td>
			<td><?php echo form_input('crud[commentaires][index]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['index'])); ?></td>
			<td><?php echo form_input('crud[commentaires][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['edit'])); ?></td>
			<td><?php echo form_input('crud[commentaires][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['erase'])); ?></td>
			<td><?php echo form_input('crud[commentaires][publish]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['commentaires']['publish'])); ?></td>
		</tr>
		<tr>
			<td>Utilisateurs</td>
			<td><?php echo form_input('crud[users][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['add'])); ?></td>
			<td><?php echo form_input('crud[users][liste]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['liste'])); ?></td>
			<td><?php echo form_input('crud[users][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['edit'])); ?></td>
			<td><?php echo form_input('crud[users][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users']['erase'])); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Rôles</td>
			<td><?php echo form_input('crud[users_types][add]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['add'])); ?></td>
			<td><?php echo form_input('crud[users_types][index]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['index'])); ?></td>
			<td><?php echo form_input('crud[users_types][edit]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['edit'])); ?></td>
			<td><?php echo form_input('crud[users_types][erase]', " ", array('type' => 'checkbox', 'values' => $crud['crud']['users_types']['erase'])); ?></td>
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
		</tr>
		<tr>
			<td>Articles</td>
			<td><?php echo form_input('crud[articles][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[articles][liste]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[articles][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[articles][erase]', " ", array('type' => 'checkbox', 'values' =>'')); ?></td>
			<td><?php echo form_input('crud[articles][publish]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
		</tr>
		<tr>
			<td>Commentaires</td>
			<td> - </td>
			<td><?php echo form_input('crud[commentaires][index]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[commentaires][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[commentaires][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[commentaires][publish]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
		</tr>
		<tr>
			<td>Utilisateurs</td>
			<td><?php echo form_input('crud[users][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][liste]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
		</tr>
		<tr>
			<td>Rôles</td>
			<td><?php echo form_input('crud[users_types][add]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users_types][index]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users_types][edit]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td><?php echo form_input('crud[users_types][erase]', " ", array('type' => 'checkbox', 'values' => '')); ?></td>
			<td> - </td>
		</tr>
	<?php
	}

	echo form_input('name', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $types));
	?>

	</tbody>
	<tfoot class="checkall">
		<tr>
			<td style="text-align:right; background-color:#e6e6e6" colspan="5">Tout séléctionner</td>
			<td style="background-color:#e6e6e6;"><input type="checkbox" id="checkall"/></td>
		</tr>
	</tfoot>
</table>
</div>