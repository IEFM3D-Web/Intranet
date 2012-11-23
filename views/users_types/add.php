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
			<p>Rôle ajouté avec succès.</p>
		</div>
		<?php
	}
}
if(isset($aControllerDatas['errors']) && !empty($aControllerDatas['errors'])){
?>
	
		<div class="error message">
		<h4>Des erreurs ont étées trouvées</h4>
			<?php
			foreach($aControllerDatas['errors'] as $k => $v){
				
				echo '<p>'.$k.' : '.$v.'</p>';
			}
			?>
		</div>
		<?php
}
?>
<div id="profil">
<h2>Ajouter un rôle</h2>
	<?php 
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'users_types.php'); 
		echo form_close();
	?>
</div>