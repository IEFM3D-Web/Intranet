<h2>Gérer les utilisateurs</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<table id="rounded-corner">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"><input type="checkbox" id="checkall"/></th>
				<th scope="col" class="rounded center">Nom</th>
				<th scope="col" class="rounded center">Prénom</th>
				<th scope="col" class="rounded center">Mail</th>
				<th scope="col" class="rounded center">Téléphone</th>
				<th scope="col" class="rounded-q4 center">Actions</th>
			</tr> 
		</thead> 
		<tfoot>
			<tr>
				<td colspan="5" class="rounded-foot-left">&nbsp;</td>
				<td class="rounded-foot-right">&nbsp;</td>
			</tr>
		</tfoot>
		 <tbody>
			 <?php
				foreach($aControllerDatas['users'] as $iKey => $aValue) {
			?>
			<tr>
				<td>
					<input type="hidden" value="0" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>hidden">
					<input type="checkbox" value="1" class="cb-element" name="delete[<?php echo $aValue['id']; ?>]" id="InputDelete<?php echo $aValue['id']; ?>">
				</td>
				<td class="center"><?php echo ucfirst($aValue['nom']); ?></td>
				<td class="center"><?php echo ucfirst($aValue['prenom']); ?></td>
				<td class="center"><?php echo $aValue['mail']; ?></td>
				<td class="center"><?php echo $aValue['tel']; ?></td>
				<td class="center">
					<a href="<?php echo BASE_URL; ?>/users/view_profil/<?php echo $aValue['id']; ?>"><img alt="Voir le profil" title="Voir le profil" src="<?php echo BASE_URL;?> /img/intranet/site/user.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $aValue['id']; ?>"><img alt="éditer" title="modifier" src="<?php echo BASE_URL;?> /img/intranet/site/article-edit.png"></a>
					&nbsp;
					<a href="<?php echo BASE_URL; ?>/users/erase/<?php echo $aValue['id']; ?>" class="ask"><img alt="supprimer" title="supprimer" src="<?php echo BASE_URL;?> /img/intranet/site/article-delete.png"></a>
				</td>
			</tr>
			<?php
			}
			?>
	</table>
	<?php echo $aControllerDatas['pagination']; ?>
	<button type="submit"><span>Supprimer</span></button>
</form>
