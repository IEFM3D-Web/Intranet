<?php 
$users = $aControllerDatas['users'];
$roleList = $aControllerDatas['usersTypesList'];
?>
<h2>Mon profil</h2>
<div id="profil">
	<div class="photo">
		<img src="<?php echo BASE_URL;?> /img/intranet/site/silhouette.png">
	</div>
	<?php
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
	?>
		<table class="info_fix">
			<tr>
				<td><?php echo ucfirst($users['nom']);?></td>
			</tr>
			<tr>
				<td><?php echo ucfirst($users['prenom']);?></td>
			</tr>
			<tr>
				<td><?php echo ucfirst($roleList[$users['role']]);?></td>
			</tr>
			<tr>
				<td><?php if($users['sexe'] == 1){echo '<img src="'.BASE_URL.'/img/intranet/site/femme.png" alt="Femme" title="Femme"/>';}else{echo '<img src="'.BASE_URL.'/img/intranet/site/homme.png" alt="Homme" title="Homme"/>';} ?></td>
				<td>
			</tr>
		</table>
		<table class="info">
			<tr>
				<td class="label">Adresse</td>
				<td><textarea cols="50" rows="4" id="InputText" name="adresse"><?php echo $users['adresse']?></textarea></td>
			</tr>
			<tr>
				<td class="label">Téléphone</td>
				<td><input type="text" name="tel" id="InputName" <?php echo $users['tel'] ? 'value="'.$users['tel'].'"' : ''; ?>/></td>
			</tr>
			<tr>
				<td class="label">Mail</td>
				<td><input type="text" name="mail" id="InputName" <?php echo $users['mail'] ? 'value="'.$users['mail'].'"' : ''; ?>/></td>
			</tr>
		</table>			
</div>
<input type="hidden" name ="id" value="<?php echo $_SESSION['user_id']; ?>"/>
<?php
echo form_close();
?>