<?php
//Tableau de configuration pour la connexion � la base de donn�es
$database = array(
	
	//Configuration version d�veloppement
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