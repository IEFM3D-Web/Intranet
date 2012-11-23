<?php
//On inclu le fichier model principal
require(MODELS.DS.'model.php');

$table = 'commentaires';

//Définition des règles de validation
$validate = array(
	'contenu' => array(
		'rule' => array('minLength', 10),
		'message' => "Contenu : La valeur de ce champs est de 10 caractères minimum."
	)
);