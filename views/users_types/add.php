<h2>Ajouter un rôle</h2>
	<?php 
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'users_types.php'); 
		echo form_close(); 
	?>