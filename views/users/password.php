<?php if(isset($aControllerDatas['errors'])){ ?>

	<div id="error">
		<?php echo $aControllerDatas['errors']; ?>
	</div>
<?php
}
?>
<div id="form">
	<center><p>Un nouveau mot de passe vous sera envoyé par mail.</p></center>
	<form class="niceform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<label class="label" for="mail">Adresse mail</label>
		<input  class="field" name="mail" type="text" value="" size="12" maxlength="180">
		<button type="submit">Envoyer</button>
	</form>
</div>


