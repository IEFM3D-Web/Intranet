<h2>Ajouter une catégorie</h2>
	<?php 
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'categories.php'); 
		echo form_close(); 
	?>