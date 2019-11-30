<?php

  
  @ $db = new mysqli('localhost', 'root', 'root', 'MP');

  if (mysqli_connect_errno()) {
     header('Location: /home.php');
     exit;
  }

?>