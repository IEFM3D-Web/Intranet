<div class="header">
	<div class="barre_haut">
		<div class="right_header">
		<span class="message-bienvenue">
			Bienvenue <b><?php echo ucfirst($_SESSION['prenom']).' '.ucfirst($_SESSION['nom']);?></b>
		</span>	
		<span class="liens-barre-infos">
			<a href="<?php echo BASE_URL."/users/profil";?>" class="profil">Mon Profil</a>
			<a href="<?php echo BASE_URL."/users/logout";?>" class="logout">Déconnexion</a>
		</span>	
		</div>
	</div>
</div>