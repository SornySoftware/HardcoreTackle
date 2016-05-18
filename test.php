<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Log Fish Experience</title>

<meta Name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link src="./resources/jquery.mobile-1.0.1/jquery.mobile-1.0.1.min.css" rel="stylesheet" type="text/css">
<script src="./resources/jquery-1.9.1.js" type="text/javascript"></script>
<script src="./resources/jquery.mobile-1.0.1/jquery.mobile-1.0.1.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

<script>
  $(document).ready(function() {
    $("#dropLure").change(function(){
      $("#country_hidden").val(("#itemType_id").find(":selected").text());
    });
  });
</script>



<style rel="stylesheet" type="text/css">
.input {
	padding: 10px;
}

</style>
<body data-role="page" data-add-back-btn="true">


	<div data-role="header" >
		Fish Log!!!
	</div>
	<form action="test.php" method="post">
	<ul class="input">
		<input type="hidden" name="user" value="sorny">
		<input type="hidden" name="type" value="Walleye">

		<li><input id="dropLure" name="lureUsed" value="Hook"></input> </li>
    Location
		<li><input id="location" name="location" value="<?php echo $_POST['location']; ?>"></input> </li>
		<li><input name="comments" value="Look! I caught a fish!!!"></input> </li>
    Condition
		<li><input id="wCond" name="wCond"    value="<?php echo $_POST['wCond']; ?>"></input> </li>
    Temp
		<li><input id="wTemp" name="wTemp"	   value="<?php echo $_POST['wTemp']; ?>"></input> </li>
    Wind
		<li><input id="wWind" name="wWind"    value="<?php echo $_POST['wWind']; ?>"></input> </li>
		<li><input name="wPrecip"  value="40%"></input> </li>
    Moon
		<li><input id="wMoon" name="wPhase" value="Full"></input> </li>
	</ul>
	<button type="submit"><a href="test.php">post</a></button>
	</form>


	<table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>lureUsed</th>
            <th>Location</th>
            <th>comments</th>
            <th>Cond</th>
            <th>Temp</th>
            <th>Wind</th>
            <th>Phase</th>
          </tr>
        </thead>
        <tbody>

        <?php
         include 'database.php';
         $pdo = Database::connect();
         $sql = 'SELECT * FROM fish_collection ORDER BY id DESC';
         foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['tackle'] . '</td>';
                  echo '<td>'. $row['location'] . '</td>';
                  echo '<td>'. $row['comments'] . '</td>';
                  echo '<td>'. $row['wCondition'] . '</td>';
                  echo '<td>'. $row['wTemperature'] . '</td>';
                  echo '<td>'. $row['wWind'] . '</td>';
                  echo '<td>'. $row['wMoon'] . '</td>';
                  //echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
                  echo '</tr>';
         }
         Database::disconnect();
        ?>

    </tbody>



<pre>
<?php 
//include 'database.php';
var_dump($_POST);
// echo htmlentities($location);
foreach ($_POST as $key => $value)
 echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

if (isset($_POST['comments']))
{
  $lureUsed = $_POST['lureUsed'];
  $location = $_POST['location'];
  $comments = $_POST['comments'];
  echo "<script type='text/javascript'>alert('$lureUsed');</script>";
  
//  $wCond = $_POST['wCond'];
//  $wTemp = $_POST['wTemp'];
//  $wWind = $_POST['wWind'];
//  $wPrecip = $_POST['wPrecip'];
//  $wPhase = $_POST['wPhase'];
  
  
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "<script type='text/javascript'>alert('$message');</script>";
  $sql = "INSERT INTO fish_collection (tackle, location, comments, wCondition, wTemperature, wWind, wMoon)  VALUES(?,?,?,?,?,?,?)";   
  $q = $pdo->prepare($sql);    
  $q->execute(array($lureUsed,$location,$comments,$wCond,$wTemp,$wWind,$wPhase));  
  Database::disconnect();
}
?>
</pre>

  <div data-role="footer">
    <nav data-role="navbar">
    <ul>
        <li><a data-icon="home" data-theme="a" onClick="window.location.href = 'Untitled-1.html';">Home</a></li>
    </ul>
    </nav>
  </div>
</body>

</html>