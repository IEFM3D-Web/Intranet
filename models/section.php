<?php
//On inclu le fichier model principal
require(MODELS.DS.'model.php');

$table = 'sections';

//Définition des règles de validation
$validate = array(
	'name' => array(
		'rule1' => array(
			'rule' => array('minLength', 3),
			'message' => "Nom : La valeur de ce champs est de 3 caractères minimum."
		),
		'rule2' => array(
			'rule' => array('maxLength', 80),
			'message' => "Nom : La valeur de ce champs est de 80 caractères maximum."
		)
	)
);