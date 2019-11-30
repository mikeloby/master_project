      
<?php
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  include('../db_con.php');
  
  $batter1 = trim($_POST['batter1']);
  $batter2 = trim($_POST['batter2']);
  $categories = trim($_POST['categories']);
  $save1 = trim($_POST['save1']);
  $iduser=$_SESSION['vuser'];
  
   if (!get_magic_quotes_gpc()){
    $batter1 = addslashes($batter1);
    $batter2= addslashes($batter2);
    $categories = addslashes($categories);
    $save1 = addslashes($save1);
    }
    
    $token = strtok($batter1, " ");
    $namein1=$token;
     
    while ($token !== false)
      {
      $namein1_1=$token;
      $token = strtok(" ");
      }
    
    $token1 = strtok($batter2, " ");
    $namein2=$token1;
     
    while ($token1 !== false)
      {
      $namein2_1=$token1;
      $token1 = strtok(" ");
      }

  $csave=0;
    
    if($save1=="Yes"){
        
           $query = "select * from saveq3";
           $result= $db->query($query);
           $num_results = $result->num_rows;
          
       for ($i=0; $i <$num_results; $i++) {
              $row = $result->fetch_assoc();
              $spid= stripslashes($row['cid']);
              $sid= stripslashes($row['uid']);
              $sbatter1= stripslashes($row['batter1']);
              $sbatter2= stripslashes($row['batter2']);
              $scriteria= stripslashes($row['criteria']);
              
              if($sid==$iduser && $sbatter1==$batter1 && $sbatter2==$batter2 && $scriteria==$categories){
                   $csave=1;
              }
              
              if($sid==$iduser && $sbatter1==$batter2 && $sbatter2==$batter1 && $scriteria==$categories){
                   $csave=1;
              }

        }

        if($csave==0){
              $query = "insert into saveq3 values(0,'$iduser','$batter1','$batter2','$categories')";
              $result= $db->query($query);
        }
    }
    
        
  $batter1a = array(); //array to hold team1 info
  $batter2a = array(); //array to hold team2 info
  
  
    switch($categories){
     
     case "Hits":
      $count=0;
      for ($i=2010; $i <=2019; $i++) {
      $cyear="b".$i;
      $gyear[$count]=$i;
      $query = "select h from $cyear where name like '$namein1%' and name like '%$namein1_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $hits1[$count]= stripslashes($row['h']);
      }
      else{
      $hits1[$count]=0;  
      }
      
      $query = "select h from $cyear where name like '$namein2%' and name like '%$namein2_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $hits2[$count]= stripslashes($row['h']);
      }
      else{
      $hits2[$count]=0;  
      }
      $count=$count+1;   
      }
      
      for ($i=0; $i <=9; $i++) {
        array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
        array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
      }
     break;
     
    case "Runs":
     $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select r from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['r']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select r from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['r']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Doubles":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select 2b from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['2b']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select 2b from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['2b']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Triples":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select 3b from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['3b']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select 3b from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['3b']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Home runs":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select hr from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['hr']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select hr from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['hr']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Stolen Bases":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select sb from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['sb']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select sb from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['sb']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Base on Balls":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select bb from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['bb']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select bb from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['bb']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Strike outs":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select so from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['so']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select so from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['so']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Runs batted in":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select rbi from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['rbi']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select rbi from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['rbi']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Batter average":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select ba from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['ba'])*1000;
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select ba from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['ba'])*1000;
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "On base percentage":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select obp from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['obp'])*1000;
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select obp from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['obp'])*1000;
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    default:
    break;
  }
    
   ?>
  
  <html>
  <head>
  <link rel="stylesheet" href='../css/cssmain.css' />
  </head>
  <body>
  <div id="coverteamsphp1">
  <div id="coverteams1"></div>
  <div id="coverteams2">
  <div class="btn-group">
  <button class="button1"><a href = "/cobatter.php">Return previous screen</button>
  <button class="button1"><a href = "/main.php">Return home screen</button>
  </div>
  </div>
  </div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("coverteams1", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "<?php echo $categories ?>"
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "<?php echo $batter1 ?>",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($batter1a, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "<?php echo $batter2 ?>",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($batter2a, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 
}
</script>
  <script src='../js/canvasjs.min.js'></script>
  </body>
  </html>
  
  <?php
  $db->close();
  }
 ?>
