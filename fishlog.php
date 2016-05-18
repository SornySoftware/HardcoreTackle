<!DOCTYPE html>
<html>
<head>
	<title>Log Fish Experience</title>
	<meta charset="utf-8">
	<meta Name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link href="../HardcoreTackle/CSS/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="CSS/themes/default/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>	
</head>

<script type="text/javascript">

</script>

<body>
<div data-role="page" data-add-btn-back="true">

	<div data-role="header">
		<h1>Fish Log</h1>
	</div> 

	<form action="fishlog.php" method="post">

		<div class="container">	

			<div class="ui-field-contain" id="dropdown">
		    	<label for="select-native-1">Tackle Used:</label>
			    <select name="lureUsed" id="select-native-1">
			        <option value="Regular Hook">Regular Hook</option>
			        <option value="Spinners">Spinners</option>
			        <option value="Glowing Jig">Glowing Jig</option>
			        <option value="Rapala">Rapala</option>
	    		</select>

	    		<div class="containerWeather" id="weather">
	    			<h3>Weather Conditions</h3>
	    			<ul>
	    				<li   value="<?php echo $_POST['wCond']; ?>">Sunny</li>
	    				<li   value="<?php echo $_POST['wTemp']; ?>">72 degrees</li>
	    				<li   value="<?php echo $_POST['wWind']; ?>">10 MPH NW</li>
	    				<li  value"FULL">Full Moon</li>
	    				<li   value="30%">30% precip</li>
	    			</ul>
	    		</div>

	    		<input type="hidden" name="user" id="user" value="testUser" ></input>
	    		<input type="hidden" name="type" id="fishType" value="Walleye" ></input>

	    		<input type="hidden" name="wCond" id="wCond" value="<?php echo $_POST['wCond']; ?>" ></input>
	    		<input type="hidden" name="wTemp" id="wTemp" value="<?php echo $_POST['wTemp']; ?>" ></input>
	    		<input type="hidden" name="wWind" id="wWind" value="<?php echo $_POST['wWind']; ?>"></input>
	    		<input type="hidden" name="wMoon" id="wPhase" value"FULL"></input>
	    		<input type="hidden" name="wPrecip" id="wPrecip" ></input>

	    		<div class="container" id="buttonContain">
	    			<button class="button" id="btnPost" type="submit">Post</button>
	    		</div>
			</div>

			<div>		
				<div class="fishContainer" id="fish">

					<div class="lableDiv" id="label">
						<h3 id="label">Location</h3>
					</div>

					<div class="wrapper" id="sub">					
						<button class="button" id="btnLocation">Find</button>
					</div>
					
					<label for="location"><input class="formInput" name="location" id="location" value="<?php echo $_POST['location']; ?>" placeholder="enter location"></input></label>
									
					<div class="imageContainer" id="imgContainer" width="200px" align="center">
						<img class="fishImageContainer" src="/img/fish.jpg" width="90%">
					</div>				

					<div class="formInput" id="textfield">
						<textarea type="text" rows="8" cols="50" id="comments" name="comments" required="required" placeholder="Additional comments"></textarea>
					</div>
				</div>		
			</div>
		</div>
	</form>


	<div data-role="footer">
		<nav data-role="navbar">
            <ul>
                <li><a href="index.html" data-icon="home" data-theme="a">Home</a></li>
            </ul>
        </nav>
	</div>



</div>
<?php 
include 'database.php';
foreach ($_POST as $key => $value)
 echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
if (isset($_POST['comments']))
{
	$type = $_POST['type'];
	$user = $_POST['user'];
	$lureUsed = $_POST['lureUsed'];
	$location = $_POST['location'];
	$comments = $_POST['comments'];
	
	$wCond = $_POST['wCond'];
	$wTemp = $_POST['wTemp'];
	$wWind = $_POST['wWind'];
	$wPrecip = $_POST['wPrecip'];
	$wPhase = $_POST['wMoon'];
	
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "<script type='text/javascript'>alert('$message');</script>";
  $sql = "INSERT INTO fish_collection (type, user, tackle, location, comments, wCondition, wTemperature, wWind, wMoon)  VALUES(?,?,?,?,?,?,?,?,?)";   
  $q = $pdo->prepare($sql);    
  $q->execute(array($type,$user,$lureUsed,$location,$comments,$wCond,$wTemp,$wWind,$wPhase));  
  Database::disconnect();
}
?>


  <div data-role="footer">
    <nav data-role="navbar">
    <ul>
        <li><a data-icon="home" data-theme="a" onClick="window.location.href = 'Untitled-1.html';">Home</a></li>
    </ul>
    </nav>
  </div>
</body>
</body>

</html>