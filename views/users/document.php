<?php 
$users = $aControllerDatas['users'];
$roleList = $aControllerDatas['usersTypesList'];
?>
<h2>Mes documents</h2>
<div id="profil">
	
	<?php
	$dirname = FILES.DS.$_SESSION['folder'];
	$dir = opendir($dirname); 

	while($file = readdir($dir)) {
		if($file != '.' && $file != '..' && !is_dir($dirname.$file))
		{
			echo '<a href="'.BASE_URL."/files/".$_SESSION['folder'].'/'.$file.'">'.$file.'</a><br />';
		}
	}

	closedir($dir);
	 ?>
	
</div>