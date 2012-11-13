<div class="tabs"><?php
include(ELEMENTS.DS.'users/formulaire_pass.php');
include(ELEMENTS.DS.'users/formulaire_connect.php');
?></div><?php
//On test si il existe des erreurs
if(isset($aControllerDatas['errors']) && !empty($aControllerDatas['errors'])) { 
	
	?><div id="error"><?php echo $aControllerDatas['errors']; ?></div><?php
}

//On test si le nouveau mot de passe a bien été envoyé
if(isset($aControllerDatas['success']) && $aControllerDatas['success'] == 'oui') {
	?><p class="success">Nouveau mot de passe envoyé.</p><?php
}
?>	