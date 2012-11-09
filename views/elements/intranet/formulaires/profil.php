<?php
if(isset($aControllerDatas['users'])) { $users = $aControllerDatas['users']; }else{$users = array();} 

if(isset($aControllerDatas['users']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['users']));
}
?>
	<table class="info">
		<tr>
			<td class="label">Adresse</td>
			<td>
				<?php
				echo form_input('adresse', "", array('type' => 'textarea','errors' => $aControllerDatas['errors'], 'values' => $users,
				'rows' =>10, 'cols' =>50));
				?>
			</td>
		</tr>
		<tr>
			<td class="label">Téléphone</td>
			<td>
				<?php			
				echo form_input('tel', "", array('errors' => $aControllerDatas['errors'], 'values' => $users));
				?>	
			</td>
		</tr>
		<tr>
			<td class="label">Mail</td>
			<td>
				<?php	
				echo form_input('mail', "", array('errors' => $aControllerDatas['errors'], 'values' => $users));
				?>
			</td>
		</tr>
		<tr>
			<td class="label">Mod password</td>
			<td>
				<?php
				echo form_input('password', "");
				?>
			</td>
		</tr>
	</table>