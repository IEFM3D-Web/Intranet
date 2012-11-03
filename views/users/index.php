<?php session_name("IEFM3D"); session_start();?>
<div id="form">
	<div id="logo"></div>
	<form class="niceform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<label class="label" for="mail">Adresse mail</label>
		<input  class="field" name="mail" type="text" value="" size="12" maxlength="180">
		<label class="label" for="password">Mot de passe</label>
		<input  class="field" name="password" type="password" value="" size="12" maxlength="180">
		<button type="submit">Connexion</button>
	</form>
	<a href="<?php echo BASE_URL; ?>/users/password" class="lien">Mot de passe oublié ?</a>
</div>
<?php if(isset($aControllerDatas['errors'])){ ?>

	<div id="error">
		<?php echo $aControllerDatas['errors']; ?>
	</div>
<?php
}
?>

