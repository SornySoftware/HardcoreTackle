<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Log Fish Experience</title>

<meta Name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

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
		<input name="user" value="sorny">
		<input name="type" value="Walleye">

		<li><input name="lureUsed" value="Hook"></input> </li>
		<li><input name="location" value="Minnesota"></input> </li>
		<li><input name="comments" value="Look! I caught a fish!!!"></input> </li>
		<li><input name="wCond"    value="Windy"></input> </li>
		<li><input name="wTemp"	   value="63"></input> </li>
		<li><input name="wWind"    value="10NW"></input> </li>
		<li><input name="wPrecip"  value="40%"></input> </li>
		<li><input name="wPhase" value="Full"></input> </li>
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

<?php 
//include 'database.php';
if (isset($_POST['comments']))
{
	$lureUsed = $_POST['lureUsed'];
	$location = $_POST['location'];
	$comments = $_POST['comments'];
	echo "<script type='text/javascript'>alert('$lureUsed');</script>";
	
	$wCond = $_POST['wCond'];
	$wTemp = $_POST['wTemp'];
	$wWind = $_POST['wWind'];
	$wPrecip = $_POST['wPrecip'];
	$wPhase = $_POST['wPhase'];
	
	
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "<script type='text/javascript'>alert('$message');</script>";
  $sql = "INSERT INTO fish_collection (tackle, location, comments, wCondition, wTemperature, wWind, wMoon)  VALUES(?,?,?,?,?,?,?)";   
  $q = $pdo->prepare($sql);    
  $q->execute(array($lureUsed,$location,$comments,$wCond,$wTemp,$wWind,$wPhase));  
  Database::disconnect();
}
?>
</body>

</html>