<?php 
echo form_input('file', "Fichier", array('class' => 'file','type' => 'file', 'errors' => $aControllerDatas['errors']));
?>

<div id="accordion">
	<?php 
	foreach($aControllerDatas['sections_liste'] as $k => $v){ 
	
		//On test si la section n'est pas vide avant de l'afficher
		if(count($aControllerDatas['sections_users'][$k]) > 0){
	?>
			<h3 style="width:564px;"><?php echo $v; ?></h3>
			<div id="section<?php echo $k; ?>">
				<table style="width:100%;">
					<tr>
					<?php 
					$cpt_eleves = 0;
					foreach($aControllerDatas['sections_users'][$k] as $key => $value) {
						echo '<td>';
						echo '<input type="checkbox" value="1" name="'.$value['folder'].'" id="Input'.$value['folder'].'" />';
						echo $value['nom'].' '.$value['prenom'];
						echo '</td>';
						$cpt_eleves++;
						if ($cpt_eleves==3) { echo'<tr></tr>'; $cpt_eleves = 0; }
					} 
					?>
					</tr>
				</table>
				<br /><br />
				<input type="checkbox" value="<?php echo $k; ?>" class="cocheAll" /> Tout cocher
			</div>
	<?php 
		}
	} 
	?>   
</div>	
