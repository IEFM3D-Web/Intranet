<?php 

if(isset($aControllerDatas['sections'])) {$sections= $aControllerDatas['sections'];}else{$sections = array();} 

if(isset($aControllerDatas['sections']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['sections']));
}

echo form_input('name', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $sections));

?>