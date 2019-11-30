<?php
  
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  include('db_con.php');
  $id=$_SESSION['idg'];
  $fname=$_SESSION['fnameg'];
  $lname=$_SESSION['lnameg'];
  $email=$_SESSION['emailg'];
  
  if($_SESSION['idg']!=""){
    $query = "select * from user where password='$id' or wid='$id'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    
    if($num_results==0){
    $query = "insert into user values(0,'$id','$id','$fname','$lname','$email')";
    $result= $db->query($query);
    $db->close();
    }    
    
  }
  
    
?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=0.7.0">
      <title>Home page</title>
      <link rel="stylesheet" href='../css/cssmain.css' type="text/css" >
      <link rel="stylesheet" href='../css/accordion.css' type="text/css" />
   </head>

<body>
<div id="cover">
<div id="contentmain">
<h2>MLB Teams</h2>
<h2>(select one)</h2>
<p>
<a href = "/teams/load1.php?id=ARI" ><img class="zoom" src = "css/Tlogos/ARI.png" alt = "ARI" width = "50" height = "50" ></a>
<a href = "/teams/load1.php?id=ATL"><img class="zoom" src = "css/Tlogos/ATL.png" alt = "ATL" width = "50" height = "50" ></a>
<a href = "/teams/load1.php?id=BAL"><img class="zoom" src = "css/Tlogos/BAL.png" alt = "BAL" width = "50" height = "50" ></a>
<a href = "/teams/load1.php?id=BOS"><img class="zoom" src = "css/Tlogos/BOS.png" alt = "BOS" width = "50" height = "50" ></a>
<a href = "/teams/load1.php?id=CHC"><img class="zoom" src = "css/Tlogos/CHC.png" alt = "CHI" width = "50" height = "50" ></a>
<a href = "/teams/load1.php?id=CHW"><img class="zoom" src = "css/Tlogos/CHW.png" alt = "CHW" width = "50" height = "50"></a>
<a href = "/teams/load1.php?id=CIN"><img class="zoom" src = "css/Tlogos/CIN.png" alt = "CIN" width = "50" height = "50"></a>
<a href = "/teams/load1.php?id=CLE"><img class="zoom" src = "css/Tlogos/CLE.png" alt = "CLE" width = "50" height = "50"></a>
<a href = "/teams/load1.php?id=COL"><img class="zoom" src = "css/Tlogos/COL.png" alt = "COL" width = "50" height = "50" ></a>
<a href = "/teams/load1.php?id=DET"><img class="zoom" src = "css/Tlogos/DET.png" alt = "DET" width = "50" height = "50"></a>
</p><p></p>
<p>
<a href = "/teams/load1.php?id=MIA"><img class="zoom" src = "css/Tlogos/MIA.png" width = "50" height = "50" alt = "MIA"></a>
<a href = "/teams/load1.php?id=HOU"><img class="zoom" src = "css/Tlogos/HOU.png" width = "50" height = "50" alt = "HOU"></a>
<a href = "/teams/load1.php?id=KCR"><img class="zoom" src = "css/Tlogos/KCR.png" width = "50" height = "50" alt = "KCR"></a>
<a href = "/teams/load1.php?id=LAA"><img class="zoom" src= "css/Tlogos/LAA.png" width = "50" height = "50" alt = "LAA"></a>
<a href = "/teams/load1.php?id=LAD"><img class="zoom" src = "css/Tlogos/LAD.png" width = "50" height = "50" alt = "LAD"></a>
<a href = "/teams/load1.php?id=MIL"><img class="zoom" src = "css/Tlogos/MIL.png" width = "50" height = "50" alt = "MIL"></a>
<a href = "/teams/load1.php?id=MIN"><img class="zoom" src = "css/Tlogos/MIN.png" width = "50" height = "50" alt = "MIN"></a>
<a href = "/teams/load1.php?id=NYM"><img class="zoom" src = "css/Tlogos/NYM.png" width = "50" height = "50" alt = "NYM"></a>
<a href = "/teams/load1.php?id=NYY"><img class="zoom" src = "css/Tlogos/NYY.png" width = "50" height = "50" alt = "NYY"></a>
<a href = "/teams/load1.php?id=OAK"><img class="zoom" src = "css/Tlogos/OAK.png" width = "50" height = "50" alt = "OAK"></a>
</p><p></p>
<p>
<a href = "/teams/load1.php?id=PHI"><img class="zoom" src = "css/Tlogos/PHI.png" width = "50" height = "50" alt = "PHI"></a>
<a href = "/teams/load1.php?id=PIT"><img class="zoom" src = "css/Tlogos/PIT.png" width = "50" height = "50" alt = "PIT"></a>
<a href = "/teams/load1.php?id=SDP"><img class="zoom" src = "css/Tlogos/SDP.png" width = "50" height = "50" alt = "SDP"></a>
<a href = "/teams/load1.php?id=SEA"><img class="zoom" src = "css/Tlogos/SEA.png" width = "50" height = "50" alt = "SEA"></a>
<a href = "/teams/load1.php?id=SFG"><img class="zoom" src = "css/Tlogos/SFG.png" width = "50" height = "50" alt = "SFG"></a>
<a href = "/teams/load1.php?id=STL"><img class="zoom" src = "css/Tlogos/STL.png" width = "50" height = "50" alt = "STL"></a>
<a href = "/teams/load1.php?id=TBR"><img class="zoom" src = "css/Tlogos/TBR.png" width = "50" height = "50" alt = "TBR"></a>
<a href = "/teams/load1.php?id=TEX"><img class="zoom" src = "css/Tlogos/TEX.png" width = "50" height = "50" alt = "TEX"></a>
<a href = "/teams/load1.php?id=TOR"><img class="zoom" src = "css/Tlogos/TOR.png" width = "50" height = "50" alt = "TOR"></a>
<a href = "/teams/load1.php?id=WSN"><img class="zoom" src = "css/Tlogos/WSN.png" width = "50" height = "50" alt = "WSN"></a>

<section class="page">
<ul class="accordion">
<li>
  <button class="accordion-control">Menu</button>
  <div class="accordion-panel">
 <p></p>
 <p><button class="button3"><a style="color: white;"   href = "sbatter.php">Search Hitters by First Name</button></a>
    <button class="button3"><a style="color: white;"   href = "spitcher.php">Search Pitchers by First Name</button></a>
    <button class="button3"><a style="color: white;"   href = "cobatter.php">Compare Hitters and Analytics formulas</button></a>
    <button class="button3"><a style="color: white;"   href = "copitcher.php">Compare Pitchers and Analytics formulas</button><a>
    <button class="button3"><a style="color: white;"   href = "logout.php">Log out</button><a></p>
 </div>
 </li>
 <li>
      <button class="accordion-control">About application</button>
      <div class="accordion-panel">
       <p class="foot2">
        Since Michael Lewis wrote the book "Moneyball" about the wonderful story of how the Oakland Athletics used statistics to, against all odds for a low income team, become a winning team and win the division in the year 2002. From that moment on, the analysis of baseball statistics became an essential part of the strategy of all teams, and it helped the balance of power between the teams with more resources and the poorest.</p>
       <p class="foot2">   
        This application has been developed with the idea of visually showing the statistics that allow comparing teams and players in the last 10 seasons. This way, using the most important indicators in a baseball game, it is possible to reach conclusions and develop strategies based on statistics.
          We hope you enjoy the application, your feedback is welcome!
       </p>
       </div>
  </li>
 <li>
  <button class="accordion-control">Feedback</button>
  <div class="accordion-panel">
  <form action="feedback.php" method="post" id="feedb" autocomplete = "on">
  <p class="foot2"> Please provide your feedback below: </p>
    <div class="row">
      <div class="col-sm-12 form-group">
        <label>How do you rate your overall experience?</label>
        <p class="foot2">
          <label class="radio">
            <input type="radio" name="experience" id="radio_experience" value="verybad" >
            Very Bad 
          </label>
          <label class="radio">
            <input type="radio" name="experience" id="radio_experience" value="bad" >
            Bad 
          </label>
          <label class="radio">
            <input type="radio" name="experience" id="radio_experience" value="average" >
            Average 
          </label>
          <label class="radio">
            <input type="radio" name="experience" id="radio_experience" value="aboveaverage" >
            Above Average 
          </label>
          <label class="radio">
            <input type="radio" name="experience" id="radio_experience" value="verygood" >
            Very Good 
          </label>
        </p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-sm-12 form-group">
        <label for="comments"> Comments:</label>
        <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="2000" rows="3"></textarea>
      </div>
    </div>
    
    <input type = "submit" name="enter" value = "Post" />

   </form>

  </div>
 </li>
  
  </ul>
  </section>

</div>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/accordion.js"></script>
<script src="js/jq-post2.js"></script>
</body>
</html>
<?php

}
 ?>
 

