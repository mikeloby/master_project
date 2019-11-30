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
<div id="contentmain2">
<form id="send" action="getbatter.php" method="post" >
<label>Search batter by First Name:
<p><input type='text' name='batter' value='' id="fname" class="typeahead"/>
<input type="submit" value="Enter"  /></p>
</label>
</form>
<form id="send1" action="main.php" method="" >
<input type="submit" value="Return to home page"  /></p>
</form>
</div>
<div id="contentmain3">
</div>

</div>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/jq-postbatter.js"></script>
<script type="text/javascript" src="typeahead.js"></script>
<script>
  $(document).ready(function () {
    $('#fname').typeahead({
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
<script>
  $(function () {
    
  $('#fname').on('click',function () {
    data1="";
  $('#contentmain3').html(data1);
        
  });
  
  });
</script>

</body>
</html>
<?php

}
 ?>
 

