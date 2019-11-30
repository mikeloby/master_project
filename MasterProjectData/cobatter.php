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
<form id="send" action="/teams/cbatter.php" method="post">
<label>Batter1 name:
<p><input type='text' name='batter1' value='' id="txtCountry" class="typeahead" required /></p>
</label>
<label>Batter2 name:
<p><input type='text' name='batter2' value='' id="txtCountry1" class="typeahead" required /></p>
</label>
<label for="categories">Categories:
<select id="criteria" name="categories" >
  <option value="Hits">Hits</option>
  <option value="Runs">Runs</option>
  <option value="Doubles">Doubles</option>
  <option value="Triples">Triples</option>
  <option value="Home runs">Home runs</option>
  <option value="Stolen Bases">Stolen Bases</option>
  <option value="Base on Balls">Base on balls</option>
  <option value="Strike outs">Strike outs</option>
  <option value="Runs batted in">Runs batted in</option>
  <option value="Batter average">Batter average</option>
  <option value="On base percentage">On base percentage</option>
  <option style='color: red' value="weighted on-base average">Analytics(Weighted on-base average)</option>
  <option style='color: red' value="insolated power">Analytics(Isolated Power)</option>
  <option style='color: red' value="batting average on balls in play">Analytics(Batting average on balls in play)</option>
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
          url: "server.php",
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
          url: "server.php",
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
 

