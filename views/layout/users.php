<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="fr">
<head>	
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="fr" />
	<title>Intranet</title>	
	<?php
	//On inclu les fichiers css
	$aCss = array(
		'users/style',
	);
	Html::css($aCss);
	?>

	<?php
	//On inclu les fichiers Javascript
	$aJs = array(
		'users/jquery-1.8.2',
		'users/jquery-ui-1.9.1.custom'
	);

	Html::js($aJs);
	?>
	<script>
	$(function(){
		var tabOpts = {
			fx: {
				opacity: "toggle",
				duration: "fast"
			}
		};
		$("#tabs").tabs(tabOpts);
	});
	</script>	
</head>
<body>

<div id="fleur">
	<?php echo $content_for_layout; ?>
</div>

</body>
</html>