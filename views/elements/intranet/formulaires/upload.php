<?php 
echo form_input('file', "Fichier", array('type' => 'file', 'errors' => $aControllerDatas['errors']));
?>

<div id="accordion">
	<?php foreach($aControllerDatas['sections_liste'] as $k => $v){ ?>
		<h3 style="width:564px;"><?php echo $v;?></h3>
		<div id="section<?php echo $k; ?>">
			<table style="width:100%;">
				<tr>
				<?php 
				$cpt_eleves = 0;
				foreach($aControllerDatas['sections_users'][$k] as $key => $value) {
					echo '<td>';
					echo '<input type="checkbox" value="'.$key.'" name="'.$value['folder'].'" id="Input'.$value['folder'].'" />';
					echo $value['nom'].' '.$value['prenom'];
					echo '</td>';
					$cpt_eleves++;
					if ($cpt_eleves==3) echo'<tr></tr>';
				} 
				?>
				</tr>
			</table>
			<br /><br />
			<input type="checkbox" value="<?php echo $k; ?>" name="cocheAll<?php echo $k; ?>" class="cocheAll" id="InputCocheAll<?php echo $k; ?>" /> Tout cocher
		</div>
	<?php } ?>   
</div>	
