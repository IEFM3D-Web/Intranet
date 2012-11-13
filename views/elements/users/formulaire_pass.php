<h2 id="tab2">Récupération.</h2>
<div class="tabbody">
	<div id="form2">
		<div id="logo"></div>
		<p>Un nouveau mot de passe vous sera envoyé par mail.</p>
		<form class="niceform" action="<?php echo BASE_URL.'/users/password'; ?>" method="post">			
			<label class="label" for="mail">Adresse mail</label>
			<input  class="field" name="mail" type="text" value="" size="12" maxlength="180">
			<button type="submit">Envoyer</button>	
		</form>
	</div>
</div>