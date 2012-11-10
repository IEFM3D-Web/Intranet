<?php 
$users = $aControllerDatas['users'];
$roleList = $aControllerDatas['usersTypesList'];

if(isset($aControllerDatas['notification'])){

	if($aControllerDatas['notification'] == 'success'){
		?>
		<script>
		$(document).ready(function(){

				 //Affichage des notifications
				 for(var i=0;i<myMessages.length;i++)
				 {
					showMessage(myMessages[i]);
				 }
				 
				 //On cache les notifications au click
				 $('.message').click(function(){			  
						  $(this).slideUp();
				  });		 
				 
		});       
		</script>
		<div class="success message">
			<p>Profil modifié avec succès.</p>
		</div>
		<?php
	}
}
?>
<h2>Mon profil</h2>
<div id="profil">
	<div class="photo">
		<img src="<?php echo BASE_URL;?> /img/intranet/site/silhouette.png">
	</div>
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
			</tr>
	</table>
	<?php
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'profil.php'); 
		echo form_close();
	?>
</div>

<h2>Mes documents</h2>
<div id="profil">
<?php 
	echo liste_Dirs(FILES.DS.$users['folder'], $users['folder']);
?>
</div>

