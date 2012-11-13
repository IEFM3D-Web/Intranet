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
			<p>Utilisateur ajouté avec succès.</p>
		</div>
		<?php
	}
}
?>
<div id="profil">
<h2>Ajouter un utilisateur</h2>
	<?php 
		echo form_create(array("enctype" => "multipart/form-data", 'action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'users.php'); 
		echo form_close(); 
	?>
</div>