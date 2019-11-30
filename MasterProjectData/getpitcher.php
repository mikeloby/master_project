      
<?php
  
   
  $pitcher = trim($_POST['pitcher']);

   if (!get_magic_quotes_gpc()){
    $pitcher = addslashes($pitcher);		
  }
  
  @ $db = new mysqli('localhost', 'root', 'root', 'MP');
  
  $token = strtok($pitcher, " ");
  $namein=$token;
   
  while ($token !== false)
    {
    $namein1=$token;
    $token = strtok(" ");
    }

?>

<html>
  <head>
    <link rel="stylesheet" href="css/cssmain.css" />
  </head>
  <body>
  <table>
  <tr><td><?php echo $pitcher ?></td></tr>
  <tr>
  <td>AGE</td><td>YEAR</td><td>TEAM</td><td>W</td><td>L</td><td>ERA</td><td>GS</td>
  <td>IP</td><td>H</td><td>R</td><td>ER</td><td>HR</td><td>BB</td><td>SO</td><td>SO9</td>
  </tr>
  <?php
       
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $query = "select age,tm,w,l,era,gs,ip,h,r,er,hr,bb,so,so9 from $cyear where name like '$namein%' and name like '%$namein1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    
    if($num_results>0){
     for ($k=0; $k <$num_results; $k++) {
        $row = $result->fetch_assoc();
        $age= stripslashes($row['age']);
        $team= stripslashes($row['tm']);
        $wins= stripslashes($row['w']);
        $losses= stripslashes($row['l']);
        $era= stripslashes($row['era']);
        $gs= stripslashes($row['gs']);
        $ip= stripslashes($row['ip']);
        $hits= stripslashes($row['h']);
        $runs= stripslashes($row['r']);
        $eruns= stripslashes($row['er']);
        $homeruns= stripslashes($row['hr']);
        $bb= stripslashes($row['bb']);
        $so= stripslashes($row['so']);
        $so9= stripslashes($row['so9']);     
     } 
  ?>
  <tr>
  <td><?php echo $age ?></td><td><?php echo $i ?></td><td><?php echo $team ?></td><td><?php echo $wins ?></td><td><?php echo $losses ?></td><td><?php echo $era ?></td><td><?php echo $gs ?></td>
  <td><?php echo $ip ?></td><td><?php echo $hits ?></td><td><?php echo $runs ?></td><td><?php echo $eruns ?></td><td><?php echo $homeruns ?></td><td><?php echo $bb ?></td><td><?php echo $so ?></td><td><?php echo $so9 ?></td>
  </tr>
  <?php
   }
  }
  ?>
  </table>
  <p>W=Wins, L=Losses, ERA=Earned runs average, GS=Games Started, IP=Innings pitched, H=Hits allowed</p> 
  <p>R=Runs allowed, ER=Earned runs, HR=Home runs allowed, BB=Base on balls allowed, SO=Strike outs, SO9=Strike out per nine innings</p>
  </body>
<?php
  $db->close();
 ?>
