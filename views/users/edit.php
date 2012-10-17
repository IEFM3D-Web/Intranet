<h2>Modifier le profil d'un utilisateur</h2>
	<?php 
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'users.php'); 
		echo form_close(); 
	?>
