<?php
  
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  include('db_con.php');
    
?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=0.7.0">
      <title>Batters</title>
      <link rel="stylesheet" href='../css/cssmain.css' type="text/css" >
      
</head>



<body>
<div id="cover">
<div id="contentmain">
<form id="send" action="/teams/cpitcher.php" method="post">
<label>Pitcher1 name:
<p><input type='text' name='pitcher1' value='' id="txtCountry" class="typeahead" required /></p>
</label>
<label>Pitcher2 name:
<p><input type='text' name='pitcher2' value='' id="txtCountry1" class="typeahead" required /></p>
</label>
</label>
<label for="categories">Categories:
<select id="criteria" name="categories" >
  <option value="Wins">Wins</option>
  <option value="Losses">Losses</option>
  <option value="Earned runs average">Earned runs average</option>
  <option value="Games started">Games started</option>
  <option value="Innings pitched">Innings pitched</option>
  <option value="Hits allowed">Hits allowed</option>
  <option value="Strike outs">Strike outs</option>
  <option value="Strike outs per nine innings">Strike outs per nine innings</option>
  <option value="Earned runs">Earned runs</option>
  <option value="Home runs allowed">Home runs allowed</option>
  <option value="Base on balls allowed">Base on balls allowed</option>
  <option value="Fielding independent pitching">Analytics(Fielding independent pitching)</option>
</select>
</label>

<label for="save">Save query?
<select id="year" name="save1" >
  <option value="No">NO</option>
  <option value="Yes">YES</option>
</select>    

<input type="submit" value="Enter"  />
</form>
<form id="send1" action="main.php" method="" >
<input type="submit" value="Return to home page"  /></p>
</form>
</div>
</div>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="typeahead.js"></script>
<script>
  $(document).ready(function () {
    $('#txtCountry').typeahead({
      source: function (query, result) {
        $.ajax({
          url: "server1.php",
          data: 'query=' + query,            
          dataType: "json",
          type: "POST",
          success: function (data) {
            result($.map(data, function (item) {
              return item;
            }));
          }
        });
      }
    });
    
    $('#txtCountry1').typeahead({
      source: function (query, result) {
        $.ajax({
          url: "server1.php",
          data: 'query=' + query,            
          dataType: "json",
          type: "POST",
          success: function (data) {
            result($.map(data, function (item) {
              return item;
            }));
          }
        });
      }
    });

  });
</script>

</body>
</html>
<?php

}
 ?>
 

