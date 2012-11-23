<?php
//On inclu le fichier model principal
require(MODELS.DS.'model.php');

$table = 'users';

//Définition des règles de validation
$validate = array(
	'nom' => array(
		'rule' => array('minLength', 3),
		'message' => 'Nom : La valeur de ce champs est de 3 caractères minimum.'
	),
	'prenom' => array(
		'rule' => array('minLength', 3),
		'message' => 'Prénom : La valeur de ce champs est de 3 caractères minimum.'
	),
	'password' => array(
		'rule' => array('minLength', 3),
		'message' => 'Mot de passe : La valeur de ce champs est de 3 caractères minimum.'
	),
	'mail' => array(
		'rule' => array('email'),
		'message' => 'Mail : Cette adresse est invalide'
	),
	'adresse' => array(
		'rule' => array('minLength', 10),
		'message' => "Adresse : La valeur de ce champs est de 10 caractères minimum."
	),
	'file' => array(
        'rule1' =>array(
            'rule' => array('checkType'),
			'message' => 'Fichier : Mauvaise extension'
        ),
		'rule2' =>array(
            'rule' => array('checkSize', 2097152),
			'message' => 'Fichier : Le fichier fait plus de 2Mo'
        ),
        'rule3' =>array(
            'rule' => array('checkUpload'),
			'message' => 'Fichier : Vous devez selectionner un fichier'
        )
	),
	'tel' => array(
		'rule1' => array(
			'rule' => array('minLength', 10),
			'message' => 'Téléphone : La valeur de ce champ est de 10 caractères '
		),
		'rule2' => array(
			'rule' => array('maxLength', 10),
			'message' => 'Téléphone : La valeur de ce champ est de 10 caractères '
		)
	),
);
?>