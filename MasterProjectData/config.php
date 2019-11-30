<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient=new Google_Client();
	$gClient->setClientId("424384451318-7jadobr0sr6qtgoilmsbjvcv8176mfn0.apps.googleusercontent.com");
	$gClient->setClientSecret("OeZ4kZnEEmUaFLpa-KVi3VoK");
	$gClient->setApplicationName("Web Login");
	$gClient->setRedirectUri("http://www.dfjieweb.com");
	$gClient->addScope("email");
	$gClient->addScope("profile");

?>