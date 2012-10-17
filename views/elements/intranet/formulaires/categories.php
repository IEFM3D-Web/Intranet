<?php 

if(isset($aControllerDatas['categories'])) {$categories= $aControllerDatas['categories'];}else{$categories = array();} 

if(isset($aControllerDatas['categories']['id'])){
	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['categories']));
}

echo form_input('name', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $categories));

?>