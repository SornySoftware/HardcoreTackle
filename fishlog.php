<!DOCTYPE html>
<html>
<head>
	<title>Log Fish Experience</title>
	<meta charset="utf-8">
	<meta Name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js" type="text/javascript"></script>	
</head>

<style rel="stylesheet" type="text/css">



#fishContainer {
	align-content: center;
	padding: 5px;
}

#wrapper {
    width: 500px;
    border: 1px solid black;
    overflow: hidden; /* will contain if #first is longer than #second */
}
#fish {
    width: 200px;
    float:left; /* add this */
    border: 1px solid red;
    height: 100%
}
#dropdown {
    border: 1px solid green;
    float: right;
    overflow: hidden; /* if you don't want #second to wrap below #first */
    height: 100%;
}

#weather {

	height: 225px;
}

#textField {
	width: 200px;
	border: 1px solid black;
	float: left;
	overflow: hidden;
}


#label {
	float: left;
	max-width: 50px;
	border: 1px red;
}

#sub {
	width: 100px;
	float: right;
	overflow: hidden;

}

.fishImageContainer {
	border: 1px red;
	padding-top: 5px;
	padding-bottom: 5px;
}

.imageContainer {
	align-content: center;
	border: 10px solid red;
}

#comments {
	resize: none;
	overflow-y: none;
	height: 99%

}
</style>

<body>
<div data-role=page>

	<div data-role="header">
		<h1>Fish Log</h1>
	</div> 

	<form action="post" method="fishlog.php">

		<div class="container">	

			<div class="ui-field-contain" id="dropdown">
		    	<label for="select-native-1">Tackle Used:</label>
			    <select name="lureUsed" id="select-native-1">
			        <option value="1">Regular Hook</option>
			        <option value="2">Spinners</option>
			        <option value="3">Glowing Jig</option>
			        <option value="4">Rapala</option>
	    		</select>

	    		<div class="containerWeather" id="weather">
	    			<h3>Weather Conditions</h3>
	    			<ul>
	    				<li name="wCond">Sunny</li>
	    				<li name="wTemp">72 degrees</li>
	    				<li name="wWind">10 MPH NW</li>
	    				<li name="wPhase">Full Moon</li>
	    				<li name="wPrecip">30% precip</li>
	    			</ul>
	    		</div>

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
					
					<label for="location"><input class="formInput" name="location" id="location" placeholder="enter location"></input></label>
									
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


	<!--<div data-role="footer">
		<nav data-role="navbar">
            <ul>
                <li><a href="Untitled-1.html" data-icon="home" data-theme="a">Home</a></li>
            </ul>
        </nav>
	</div> -->



</div>
<?php 
//include 'database.php';
if (isset($_POST['comments']))
{
	$lureUsed = $_POST['lureUsed'];
	//$location = $_POST['location'];
	$comments = $_POST['comments'];
	/*
	$wCond = $_POST['wCond'];
	$wTemp = $_POST['wTemp'];
	$wWind = $_POST['wWind'];
	$wPrecip = $_POST['wPrecip'];
	$wPhase = $_POST['wPhase'];
	*/
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "<script type='text/javascript'>alert('$message');</script>";
  //$sql = "INSERT INTO fish_collection (lureUsed, location, comments, wCond, wTemp, wWind, wPrecip, wPhase)  VALUES(?,?,?,?,?,?,?,?)";   
  //$q = $pdo->prepare($sql);    
  //$q->execute(array($lureUsed,$location,$comments,$wTemp,$wWind,$wPrecip,$wPhase));  
  Database::disconnect();
}
?>
</body>

</html>