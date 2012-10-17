<?php
/**
*Fonction chargée de faire une redirection vers l'url passée en paramètre
*@param  varchar  $url  url de la page de redirection
*/
function redirect($url){
	
	header("Location:".BASE_URL."/".$url);
	die();
}

/**
*Fonction permettant l'envoi de mail, utilisant la librairie SwiftMailler http://swiftmailer.org/:!
*@param  varchar  $parametres  tableaux des paramètres
*@param  varchar  $mail url    adresse mail
*/
function sendmail($parametres,$mail){

	require(LIB.DS.'swift'.DS.'swift_required.php');

	$transport = Swift_SmtpTransport::newInstance($parametres['url'],$parametres['port'] )
	  ->setUsername($parametres['user'])
	  ->setPassword($parametres['password']);

	$mailer = Swift_Mailer::newInstance($transport);

	if(isset($mail['view'])){
		ob_start();
		include(ELEMENTS.DS.'email'.DS.$mail['view'].'.php');
		$content_for_layout =ob_get_clean();
	}
	
	
	ob_start();

	$html = ob_get_clean();

	
	//Création du message
	$message = Swift_Message::newInstance()

	//On définit le sujet du message
	->setSubject($mail['sujet'])

	//On définit le ou les expéditeurs du message a l'aide d'un tableau associatif
	->setFrom($mail['from'])

	//On définit le ou les destinataires du message a l'aide d'un tableau associatif
	->setTo($mail['to'])
	
	//On récupère le cors du message
	->addPart($html, 'text/html');	 

	//On envoi le message
	$result = $mailer->send($message);
}
?>