<?php
  
  require_once "config.php";
  //require_once "config1.php";
  $loginURL=$gClient->createAuthUrl();
    
  session_start();
  unset($_SESSION['vuser']);
  unset($_SESSION['access_token']);
  session_destroy();    
  
  $code=$_GET['code'];  
  
  session_start();
  
 if($code!=""){
  
    $token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
    $oAuth= new Google_Service_Oauth2($gClient);
    $userData=$oAuth->userinfo_v2_me->get(); 
    $_SESSION['vuser']=$userData['id'];
    $_SESSION['idg']=$userData['id'];
    $_SESSION['fnameg']=$userData['givenName'];
    $_SESSION['lnameg']=$userData['familyName'];
    $_SESSION['emailg']=$userData['email'];
    header('Location: /main.php');
    exit();
  }

  
?>
  <!-- page content -->
 
  
<html>
<head>
<title>Log in page</title>
<meta charset= "utf-8">
<meta name="keywords" content="Master Project">
<meta name="description" content="MLB, major league baseball">
<meta name="viewport" content="width=device-width, initial-scale=0.7.0, shrink-to-fit=no">
<meta http-equiv="refresh" content="120">
<link rel="stylesheet" href="css/cssmain.css">
</head>

<body>
<div id="cover">
<div id="content">

      <h2>MLB Teams and Players Statistics</h2>
      <form method="post" action="">

        <label for="username">Enter Username: </label>
        <input type="text" pattern=".{10,}" id="username" name="id" 
     minlenght=10 maxlength="20" required autofocus />
        
        <label for="password">Enter Password: </label>
        <input type="password" id="password" pattern=".{10,}" name="password" 
     minlenght=10 maxlength="20" required />
        <input type="submit" value="Sign in" name="login" />
        <p></p>
        <input type="button" onclick="window.location= '<?php echo $loginURL ?>';"/>
      
        </form>
<button class="button3"><a style=" color: white;" href = "register.html">Register</a></button></div>

<?php
  
  if(isset($_POST['login'])){
  
   session_start();
   
   $id = trim($_POST['id']);
   $pass = trim($_POST['password']);
  
     if (!get_magic_quotes_gpc()){
        $id = addslashes($id);
        $pass = addslashes($pass);
  }
    
   $idcomp="";
   $password="";
   
   include('db_con.php');
  
  $query = "select * from user";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  $count=0;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $idmain= stripslashes($row['uid']);
     $idcomp= stripslashes($row['wid']);
     $passcomp=stripslashes($row['password']);
     
     if($idcomp==$id && $passcomp==sha1($pass)){
        $_SESSION['vuser']=$idcomp;
        $count=$count+1;
     }
  }
  
  $result->free();
  $db->close();
  
  if($count==1){
  
  header('Location: /main.php');
  
  } 
  else {
?>
  <p class="foot1"><span class = "shiftright1">(ID/password incorrect)</span></p>
<?php  
  }
}
?>
<!--
<script src="jquery-1.11.0.js"></script>
<script src="advise.js"></script>
//-->

</div>
</div>
</body>
</html>
