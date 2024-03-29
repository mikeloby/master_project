<?php

    
	session_start();
    

	require_once "config1.php";
	 
	try {
		$accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	 
	if (! isset($accessToken)) {
		if ($helper->getError()) {
			header('HTTP/1.0 401 Unauthorized');
			echo "Error: " . $helper->getError() . "\n";
			echo "Error Code: " . $helper->getErrorCode() . "\n";
			echo "Error Reason: " . $helper->getErrorReason() . "\n";
			echo "Error Description: " . $helper->getErrorDescription() . "\n";
		} else {
			header('HTTP/1.0 400 Bad Request');
			echo 'Bad request';
		}
		exit;
	}
	 
	
	// Logged in
	// The OAuth 2.0 client handler helps us manage access tokens
	$oAuth2Client = $fb->getOAuth2Client();
	 
	// Get the access token metadata from /debug_token
	$oAuth2Client = $fb->getOAuth2Client();
	 
	// Get user’s Facebook ID
	$userId = $tokenMetadata->getField('user_id');
	header('Location: /main.php');
	
	?>