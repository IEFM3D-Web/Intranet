<?php
//On inclu le fichier model principal
require(MODELS.DS.'model.php');

$table = 'users';

//Définition des règles de validation
$validate = array(
	'nom' => array(
		'rule1' => array(
			'rule' => array('minLength', 3),
			'message' => "La valeur de ce champs est de 3 caractères minimum."
		),
		'rule2' => array(
			'rule' => array('maxLength', 80),
			'message' => "La valeur de ce champs est de 80 caractères maximum."
		)
	),
	'name' => array(
		'rule1' => array(
			'rule' => array('minLength', 3),
			'message' => "La valeur de ce champs est de 3 caractères minimum."
		),
		'rule2' => array(
			'rule' => array('maxLength', 80),
			'message' => "La valeur de ce champs est de 80 caractères maximum."
		)
	),
	'prenom' => array(
		'rule1' => array(
			'rule' => array('minLength', 3),
			'message' => "La valeur de ce champs est de 3 caractères minimum."
		),
		'rule2' => array(
			'rule' => array('maxLength', 80),
			'message' => "La valeur de ce champs est de 80 caractères maximum."
		)
	),
	'mail' => array(
		'rule' => array('email'),
		'message' => 'Cette adresse est invalide'
	),
	'password' => array(
		'rule1' => array(
			'rule' => array('minLength', 3),
			'message' => "La valeur de ce champs est de 3 caractères minimum."
		),
		'rule2' => array(
			'rule' => array('maxLength', 80),
			'message' => "La valeur de ce champs est de 80 caractères maximum."
		)
	),
	'adresse' => array(
		'rule' => array('minLength', 10),
		'message' => "La valeur de ce champs est de 10 caractères minimum."
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