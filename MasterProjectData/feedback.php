      
<?php
   session_start();
   
  $rate = trim($_POST['experience']);
  $comments = trim($_POST['comments']);
  

   if (!get_magic_quotes_gpc()){
    $rate = addslashes($rate);
    $comments = addslashes($comments);		
  }
  
  include('db_con.php');
    
  $query = "insert into feedback values(0,'$rate','$comments')";
  $result= $db->query($query);
  
  ?>
  
  <p>Feedback has been received and saved thank you!</p>
     
  <?php
  $db->close();
 ?>
