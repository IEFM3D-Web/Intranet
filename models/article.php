<?php
//On inclu le fichier model principal
require(MODELS.DS.'model.php');

$table = 'articles';

//Définition des règles de validation
$validate = array(
	'titre' => array(
		'rule1' => array(
			'rule' => array('minLength', 3),
			'message' => "La valeur de ce champs est de 3 caractères minimum."
		),
		'rule2' => array(
			'rule' => array('maxLength', 80),
			'message' => "La valeur de ce champs est de 80 caractères maximum."
		)
	),
	'chapeau' => array(
		'rule' => array('minLength', 10),
		'message' => "La valeur de ce champs est de 10 caractères minimum."
	),
	'contenu' => array(
		'rule' => array('minLength', 10),
		'message' => "La valeur de ce champs est de 10 caractères minimum."
	)
);