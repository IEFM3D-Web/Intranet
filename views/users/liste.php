<h2>Gérer les utilisateurs</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company">Autorisé</th>
				<th scope="col" class="rounded center">Nom</th>
				<th scope="col" class="rounded center">Prénom</th>
				<th scope="col" class="rounded center">Mail</th>
				<th scope="col" class="rounded center">Téléphone</th>
				<th scope="col" class="rounded center">Actions</th>
				<th scope="col" class="rounded-q4 center"><input type="checkbox" id="checkall"/></th>
			</tr> 
		</thead> 
		 <tbody>
			 <?php
				foreach($aControllerDatas['users'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<?php if($aValue['is_auth'] == 1) { ?>
						<a href="<?php echo BASE_URL.'/users/publish/'.$aValue['id'].'/0'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/green.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } else { ?>
						<a href="<?php echo BASE_URL.'/users/publish/'.$aValue['id'].'/1'; ?>"><img src="<?php echo BASE_URL.'/img/intranet/site/red.png'; ?>" alt="Oui" title="Oui" /></a>
					<?php } ?>
				</td>
				<td class="text"><?php echo ucfirst($aValue['nom']); ?></td>
				<td class="text"><?php echo ucfirst($aValue['prenom']); ?></td>
				<td class="text"><?php echo $aValue['mail']; ?></td>
				<td class="text"><?php echo $aValue['tel']; ?></td>
				<td>
					<a href="<?php echo BASE_URL; ?>/users/view_profil/<?php echo $aValue['id']; ?>"><img alt="Voir le profil" title="Voir le profil" src="<?php echo BASE_URL;?>/img/intranet/site/user.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="modifier" src="<?php echo BASE_URL;?>/img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/users/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?>/img/intranet/site/article-delete.png"></a>
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
				<td colspan="7" class="foot">
					<?php 
					echo $aControllerDatas['pagination']; 
					echo form_input('Supprimer','',array('type' => 'submit', 'class' => 'button small red', 'onclick' => 'return deleteUser();'));
					?>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
