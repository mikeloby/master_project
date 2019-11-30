      
<?php
   session_start();
   
  $email = trim($_POST['email']);
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $userid = trim($_POST['userid']);
  $passw = trim($_POST['passw']);
  

   if (!get_magic_quotes_gpc()){
    $email = addslashes($email);
    $fname = addslashes($fname);
    $lname = addslashes($lname);
    $userid = addslashes($userid);
    $passw = addslashes($passw);
   		
  }
  
  include('db_con.php');
  $passw=sha1($passw);
  
  
  $query = "select * from user where password='$passw' or wid='$userid'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  if($num_results==0){
  $query = "insert into user values(0,'$userid','$passw','$fname','$lname','$email')";
  $result= $db->query($query);
  $_SESSION['vuser']=$userid;
  $db->close();
  
  ?>
  
  <p>Registration has been completed,please &nbsp;<a href = "home.php">click here</a>&nbsp;to log in!</p>
  <p><img src = "css/Tlogos/hint.png" width = "30" height = "30" ></p>
  <?php
  
  }
  
  else{
  ?>
 
 <p>ID or password already taken, please &nbsp;<a href = "register.html"> CLICK HERE</a> &nbsp; to try again</p> 
 <p><img src = "css/Tlogos/warning.png" width = "30" height = "30" ></p>

  <?php
 
  }
  
 ?>
