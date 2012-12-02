<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="fr">
	<head>
	<?php 
	$sUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/'; //Affectation de l'url
	$sUrl = trim($sUrl, '/'); //On enl�ve les / en d�but et fin de chaine
	$aParams = explode('/', $sUrl);
	if(count($aParams) > 1){
		$title = 'Intranet-'.$aParams[0].'-'.$aParams[1];
	}else{
		$title = 'Intranet-'.$sUrl;
	}
	?>	
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="fr" />
	<?php	
	//On inclu les fichiers css
	$aCss = array(
		'intranet/style',
		'intranet/stylecss3',
		'intranet/form',
		'intranet/checkbox',
		'intranet/plugins/accordion/jquery.ui.all',
		'intranet/plugins/accordion/jquery.ui.base',
		'intranet/plugins/accordion/jquery.ui.core',
		'intranet/plugins/accordion/jquery.ui.theme',
		'intranet/plugins/accordion/jquery.ui.accordion',
		'intranet/plugins/accordion/jquery-ui',
		'intranet/plugins/wysiwyg',
		'intranet/plugins/wysiwyg.modal',
		'intranet/plugins/wysiwyg-editor'
	);
	Html::css($aCss);
	
	//On inclu les fichiers Javascript
	$aJs = array(
		'intranet/jquery-1.8.3.min',
		'intranet/jquery-ui-1.9.2.custom.min',
		'intranet/ddaccordion',
		'intranet/jconfirmaction',
		'intranet/checkall',
		'ckeditor/ckeditor',
		'ckfinder/ckfinder',
		'intranet/tipsy',
		'intranet/js_start'
	);
	Html::js($aJs);
	?>
</head>
<body class="CKFinderFrameWindow">
<script type='text/javascript'>
  $(function() {
    $('.tooltip').tipsy({gravity: 's'});
  });
</script>
	<?php include(ELEMENTS.DS.'intranet/header.php'); ?>
	<div class="main_content"> 
		<div class="center_content">  
			<?php include(ELEMENTS.DS.'intranet/left_content.php'); ?>
			<div class="right_content"> 
				<!-- Affichage de la vue -->
				<?php echo $content_for_layout;?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php include(ELEMENTS.DS.'intranet/footer.php'); ?>
</body>
</html>