<div id="tabs">
	<ul id="tabs">
		<li><a class="connexion" href="#connexion">Connexion</a></li>
		<li><a class="password" href="#password">Mot de passe oublié</a></li>
	</ul>	
	<div id="tabs_content_container">
			<div id="connexion">
				<div id="logo"></div>
				<?php
				//On test si il existe des erreurs
				if(isset($aControllerDatas['errors-connexion'])) { 
				?>
					<div class="error">
						<?php echo $aControllerDatas['errors-connexion']; ?>
					</div>
				<?php
				}
				?>
				<form  action="<?php echo BASE_URL.'/users/index'; ?>" method="post">
					<input type="hidden"  name="form"  value="connexion">
					<input class="field" name="mail" type="text" onfocus="if(this.value==this.defaultValue)value=''" onblur="if(this.value=='')value=this.defaultValue;" value="Adresse mail">
					<input class="field" name="password" type="text" onfocus="if(this.value==this.defaultValue)value='',type='password'" onblur="if(this.value=='')value=this.defaultValue,type='text';" value="Mot de passe">
					<button type="submit">Connexion</button>
				</form>
			</div>
			<div id="password">
				<div id="logo"></div>
				<?php
				//On test si il existe des erreurs
				if(Session::read('errors-password')) { 
				?>
					<div class="error">
						<?php echo Session::read('errors-password'); ?>
					</div>
				<?php
					Session::delete('errors-password');
				}
				?>
				<?php
				//On test si il existe des messages de succès
				if(Session::read('success-password')) { 
				?>
					<div class="success">
						<?php echo Session::read('success-password'); ?>
					</div>
				<?php
					Session::delete('success-password');
				}
				?>
				<p>Un nouveau mot de passe vous sera envoyé par mail.</p>
				<form action="<?php echo BASE_URL.'/users/index'; ?>" method="post">
					<input type="hidden"  name="form"  value="password">
					<input class="field" name="mail" type="text" onfocus="if(this.value==this.defaultValue)value=''" onblur="if(this.value=='')value=this.defaultValue;" value="Adresse mail">
					<button type="submit">Envoyer</button>	
				</form>
			</div>
	</div>	
</div>