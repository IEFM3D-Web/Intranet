<?php
//On test si il y a des erreurs à afficher
if(isset($aControllerDatas['errors']) && !empty($aControllerDatas['errors'])){
?>
	
	<div class="error message">
	<h4>Des erreurs ont étées trouvées</h4>
		<?php
		//Parcours du tableau des erreurs
		foreach($aControllerDatas['errors'] as $v){
			
			//affichage des erreurs
			echo '<p>'.$v.'</p>';
		}
		?>
	</div>
<?php
}
?>
<div id="profil">
<h2>Modifier le profil d'un utilisateur<?php echo form_input('Retour à la liste','',array('type' => 'submit', 'class' => 'button small blue', 'onclick' => 'window.location = \'../liste\'')); ?></h2>
	<?php 
		echo form_create(array('action' => $_SERVER['REQUEST_URI'], 'method' => 'post', 'class' => 'valid'));
			include(ELEMENTS.DS.'intranet'.DS.'formulaires'.DS.'users.php'); 
		echo form_close(); 
	?>
</div>