<?php
    
	require_once "vendor/autoload.php";
	session_start();
		
	$fb= new Facebook\Facebook([
		'app_id' =>'2536535353078130',
		'app_secret' =>'d1e56c6fb789a5f84b3ad81740ccbb64',
		'default_graph_version' =>'v4.0'
	]); 
	
	$helper=$fb->getRedirectLoginHelper();
    $login_url =$helper->getLoginUrl("https://www.dfjieweb.com/home.php");
	
		
?>
