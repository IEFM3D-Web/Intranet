<div id="form">
	<p>Un nouveau mot de passe vous sera envoyé par mail.</p>
	<form class="niceform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<label class="label" for="mail">Adresse mail</label>
		<input  class="field" name="mail" type="text" value="" size="12" maxlength="180">
		<button type="submit">Envoyer</button>
		
		<?php
		//On test si le nouveau mot de passe a bien été envoyé
		if(isset($aControllerDatas['success']) && $aControllerDatas['success'] == 'oui'){
		?>
		
		<p class="success">Nouveau mot de passe envoyé.</p>

		<?php
		}
		?>
		
	</form>
</div>
<?php 
//On test si il existe des erreurs
if(isset($aControllerDatas['errors']) && !empty($aControllerDatas['errors'])){ ?>

	<div id="error">
		<?php echo $aControllerDatas['errors']; ?>
	</div>
<?php
}
?>


