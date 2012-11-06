<?php 
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
			<p>Catégorie modifiée avec succès.</p>
		</div>
		<?php
	}
}
?>
<div id="profil">
<h2>Éditer une catégorie</h2>
	<?php 
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'categories.php'); 
		echo form_close(); 
	?>
</div>