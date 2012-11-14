<?php
//Tableau de configuration pour la connexion à la base de données
$database = array(
	
	//Configuration version développement
	'localhost' =>array(
		'host' => 'localhost',
		'name' => 'intranet',
		'user' => 'root',
		'password' => '',
		'driver' => 'mysql'
		),
	
	//Configuration version production
	'online' =>array(
		'host' => 'localhost',
		'name' => 'intranet',
		'user' => 'root',
		'password' => '',
		'driver' => 'mysql'
		)
);
?>