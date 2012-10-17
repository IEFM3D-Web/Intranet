<?php 
$profil = $aControllerDatas['profil'];
$roleList = $aControllerDatas['usersTypesList'];?>


<h2>Profil de <?php echo  ucfirst($profil['nom'])." ".ucfirst($profil['prenom']); ?></h2>
<div id="profil">
	<div class="titre">Informations</div>
	<table class="photo">
		<tr>
			<td> </td>
		</tr>
	</table>
	<div class="clear"></div>
	<table class="info">
		<tr>
			<td class="label">Sexe</td>
			<td><?php if($profil['sexe'] == 1){echo '<img src="'.BASE_URL.'/img/intranet/site/femme.png" alt="Femme" title="Femme"/>';}else{echo '<img src="'.BASE_URL.'/img/intranet/site/homme.png" alt="Homme" title="Homme"/>';} ?></td>
			<td>
		</tr>
		<tr>
			<td class="label">Nom</td>
			<td><?php echo ucfirst($profil['nom']);?></td>
		</tr>
		<tr>
			<td class="label">Prénom</td>
			<td><?php echo ucfirst($profil['prenom']);?></td>
		</tr>
		<tr>
			<td class="label">Adresse</td>
			<td><?php echo ucfirst($profil['adresse']);?></td>
		</tr>
		<tr>
			<td class="label">Téléphone</td>
			<td><?php echo $profil['tel'];?></td>
		</tr>
		<tr>
			<td class="label">Mail</td>
			<td><?php echo $profil['mail'];?></td>
		</tr>  
		<tr>
			<td class="label">Statut</td>
			<td><?php echo ucfirst($roleList[$profil['role']]);?></td>
		</tr> 
	</table>
</div>
