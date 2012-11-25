<div id="tabs">
	<ul>
		<li class="connexion"><a class="connexion-tab" href="#connexion">Connexion</a></li>
		<li class="password"><a class="password-tab" href="#password">Mot de passe oublié</a></li>
	</ul>	
	<div id="tabs_content_container">
		<div id="connexion">
			<div class="logo"></div>
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
				<p>
					<input type="hidden"  name="form"  value="connexion" />
					<input class="field" name="mail" type="text" onfocus="if(this.value==this.defaultValue)value=''" onblur="if(this.value=='')value=this.defaultValue;" value="Adresse mail" />
					<input class="field" name="password" type="text" onfocus="if(this.value==this.defaultValue)value='',type='password'" onblur="if(this.value=='')value=this.defaultValue,type='text';" value="Mot de passe" />
					<button type="submit">Connexion</button>
				</p>	
			</form>
		</div>
		<div id="password">
			<div class="logo"></div>
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
				<p>
					<input type="hidden"  name="form"  value="password" />
					<input class="field" name="mail" type="text" onfocus="if(this.value==this.defaultValue)value=''" onblur="if(this.value=='')value=this.defaultValue;" value="Adresse mail" />
					<button type="submit">Envoyer</button>	
				</p>	
			</form>
		</div>
	</div>	
</div>