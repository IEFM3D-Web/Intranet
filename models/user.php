<?php
//On inclu le fichier model principal
require(MODELS.DS.'model.php');

$table = 'users';

//Définition des règles de validation
$validate = array(
	'mail' => array(
		'rule' => array('email'),
		'message' => 'Cette adresse est invalide'
	),
	'adresse' => array(
		'rule' => array('minLength', 10),
		'message' => "La valeur de ce champs est de 10 caractères minimum."
	),
	'upload' => array(
		'rule' => array('notEmpty'),
		'message' => "Vous devez selectionner un fichier."
	),
	'tel' => array(
		'rule1' => array(
			'rule' => array('minLength', 10),
			'message' => 'La valeur de ce champ est de 10 caractères '
		),
		'rule2' => array(
			'rule' => array('maxLength', 10),
			'message' => 'La valeur de ce champ est de 10 caractères '
		)
	),
);
?>