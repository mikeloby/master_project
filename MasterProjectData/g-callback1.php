<?php
	
	require_once "config.php";
		
	if(isset($_SESSION['access_token'])){
		$gClient->setAccessToken($_SESSION['access_token']);
	}
	elseif(isset($_GET['code'])){
	     $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
	     $_SESSION['access_token']=$token;
	     $oAuth= new Google_Service_Oauth2($gClient);
		 $userData=$oAuth->userinfo_v2_me->get(); 
		 $_SESSION['vuser']=$userData['id'];
		 header('Location: /main.php');
		 exit();	
	}
	else{
		header('Location: /home.php');
		exit();	
	}
       
    
    ?>