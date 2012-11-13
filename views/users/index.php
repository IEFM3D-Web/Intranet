
<div class="tabs">
<?php
include(ELEMENTS.DS.'users/formulaire_connect.php');
include(ELEMENTS.DS.'users/formulaire_pass.php');
?></div><?php
//On test si il existe des erreurs
if(isset($aControllerDatas['errors'])) { 
	
	?><div id="error"><?php echo $aControllerDatas['errors']; ?></div><?php
}
?>