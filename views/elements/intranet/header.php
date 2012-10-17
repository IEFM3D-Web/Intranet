<div class="header">
	<div class="barre_haut">
		<div class="right_header">Bienvenue <b><?php echo ucfirst(
			$_SESSION['prenom']).' '.ucfirst($_SESSION['nom']);?></b> | 
			<a href="<?php echo BASE_URL."/users/profil";?>" class="profil">Profil</a> |
			<a href="<?php echo BASE_URL."/users/document";?>" class="profil">Mes documents</a> |
			<a href="<?php echo BASE_URL."/users/logout";?>" class="logout">Déconnexion</a>
		</div>
	</div>
</div>