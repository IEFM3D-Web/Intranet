<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="fr">
<head>	
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="fr" />
	<title>Intranet - Connexion</title>	
	<?php
	//On inclu les fichiers css
	$aCss = array(
		'users/style',
		'users/simple-sliding-doors'
	);
	Html::css($aCss);
	?>	
	<script type="text/javascript">document.documentElement.className += " js";</script>
	

	<?php
	//On inclu les fichiers Javascript
	$aJs = array(
		'users/jquery-1.7.min',
		'users/jquery.tabs'
	);

	Html::js($aJs);
	?>
    <script type="text/javascript">
		$(document).ready(function(){
			$(".tabs").accessibleTabs({
				tabhead:'h2',
				fx:"show",
				autoAnchor:true
			});
		});
    </script>   
</head>
<body>

<?php //include(ELEMENTS.DS.'users/header.php'); ?>
<!-- Affichage de la vue -->

<div id="fleur">
	<?php echo $content_for_layout; ?>
</div>

</body>
</html>