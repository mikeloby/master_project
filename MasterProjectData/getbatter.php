      
<?php
  
   
  $batter = trim($_POST['batter']);

   if (!get_magic_quotes_gpc()){
    $batter = addslashes($batter);		
  }
  
  @ $db = new mysqli('localhost', 'root', 'root', 'MP');
  
  $token = strtok($batter, " ");
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
  <tr><td><?php echo $batter ?></td></tr>
  <tr>
  <td>AGE</td><td>YEAR</td><td>TEAM</td><td>RS</td><td>H</td><td>2B</td><td>3B</td>
  <td>HR</td><td>RBI</td><td>SB</td><td>BB</td><td>SO</td><td>OBP</td><td>BA</td><td>SLG</td>
  </tr>
  <?php
       
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $query = "select age,tm,r,h,2b,3b,hr,rbi,sb,bb,so,ba,obp,slg from $cyear where name like '$namein%' and name like '%$namein1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    
    if($num_results>0){
     for ($k=0; $k <$num_results; $k++) {
        $row = $result->fetch_assoc();
        $age= stripslashes($row['age']);
        $team= stripslashes($row['tm']);
        $runs= stripslashes($row['r']);
        $hits= stripslashes($row['h']);
        $double= stripslashes($row['2b']);
        $triple= stripslashes($row['3b']);
        $homeruns= stripslashes($row['hr']);
        $rbi= stripslashes($row['rbi']);
        $sb= stripslashes($row['sb']);
        $bb= stripslashes($row['bb']);
        $so= stripslashes($row['so']);
        $ba= stripslashes($row['ba']);
        $obp= stripslashes($row['obp']);
        $slg= stripslashes($row['slg']);     
     } 
  ?>
  <tr>
  <td><?php echo $age ?></td><td><?php echo $i ?></td><td><?php echo $team ?></td><td><?php echo $runs ?></td><td><?php echo $hits ?></td><td><?php echo $double ?></td><td><?php echo $triple ?></td>
  <td><?php echo $homeruns ?></td><td><?php echo $rbi ?></td><td><?php echo $sb ?></td><td><?php echo $bb ?></td><td><?php echo $so ?></td><td><?php echo $obp ?></td><td><?php echo $ba ?></td><td><?php echo $slg ?></td>
  </tr>
  <?php
   }
  }
  ?>
  </table>
  <p>RS=Runs Scored, H=Hits, 2B=Doubles, 3B=Triples, HR=Home Runs, RBI=Runs Batted in</p> 
  <p>SB=Stolen Bases, BB=Base on balls, SO=Strike Outs, OBP=On Base percentage, BA=Batter Average, SLG=Slugging</p>
  </body>
<?php
  $db->close();
 ?>
