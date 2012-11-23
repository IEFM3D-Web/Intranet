<?php 
if(isset($aControllerDatas['users'])) { $users = $aControllerDatas['users']; }else{$users = array();} 

//Si l'id existe c'est qu'on est dans le cas d'une édition d'utilisateur
if(isset($aControllerDatas['users']['id'])){

	echo form_input('id', '', array('type' => 'hidden', 'values' => $aControllerDatas['users']));
}else{
	$newUser = true;
}

echo form_input('nom', "Nom", array('errors' => $aControllerDatas['errors'], 'values' => $users));

echo form_input('prenom', "Prénom", array('errors' => $aControllerDatas['errors'], 'values' => $users));

echo form_input('mail', "Mail", array('errors' => $aControllerDatas['errors'], 'values' => $users));

if(isset($newUser)){echo form_input('password', "Password", array('errors' => $aControllerDatas['errors'], 'values' => $users));}

echo form_input('adresse', "Adresse", array('type' => 'textarea','errors' => $aControllerDatas['errors'], 'values' => $users,
'rows' =>10, 'cols' =>50));

echo form_input('tel', "Téléphone", array('errors' => $aControllerDatas['errors'], 'values' => $users));

echo form_input('sexe', "Sexe", array('type' => 'select', 'errors' => $aControllerDatas['errors'], 'values' => $users, 'datas' => $aControllerDatas['userTypesSex']));

echo form_input('section_id', "Section", array('type' => 'select', 'errors' => $aControllerDatas['errors'], 'values' => $users, 'datas' => $aControllerDatas['userTypesSection']));

echo form_input('role', "Rôle", array('type' => 'select', 'errors' => $aControllerDatas['errors'], 'values' => $users, 'datas' => $aControllerDatas['usersTypesList']));
?>
