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
		'users/style'
	);
	css($aCss);
	?>
</head>
<body>

<?php //include(ELEMENTS.DS.'users/header.php'); ?>
<!-- Affichage de la vue -->
<?php echo $content_for_layout; ?>
<div id="fleur"></div>

</body>
</html>