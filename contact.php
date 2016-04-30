<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hardcore Tackle</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>




<link href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css">
<link href="CSS/style.css" rel="stylesheet" type="text/css">



<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js" type="text/javascript"></script>


<style rel="stylesheet" type="text/css">

.img {
	display: table-caption;
	caption-side: bottom;
	font-size: 100%;
	margin-top: -10px;
	margin-bottom: 10px;
	text-align: center;	
}


ui-content {
	/*display: inline-block; */
	
	
}

listview {
	/*display: inline-block; */
	
}



</style>






<body>

   
    
    <div data-role="page" id="Contact" data-position="fixed" data-add-back-btn="true"> <!-- CONTACT PAGE -->
      <div data-role="header">
        <h1>Contact Us</h1>
      </div>
      <div data-role="content" style="width:41.919191919192%; padding:0 20px;">
      <h2 class="wsite-content-title" style="text-align:left;">
      <font size="2" style="font-weight: normal;">EMAIL ADDRESS</font>
      </h2>
      <div class="paragraph" style="text-align:left;"><span style="">hardcoretackle@gmail.com</span></div>
      
      <h2 class="wsite-content-title" style="text-align:left;"><font size="2" style="font-weight: normal;">TELEPHONE NUMBER</font></h2>
      <div class="paragraph" style="text-align:left;"><a href="tel:218-689-3183">218-689-3183</a></div>
      <div> </div>
      <h2 class="wsite-content-title" style="text-align:left;"><font size="2" style="font-weight: normal;">PHYSICAL ADDRESS</font></h2>
      <div class="paragraph" style="text-align:left;">18576 State Hwy 32 SE<br>Red Lake Falls, MN &nbsp;56750</div>
      <div> </div>
      Content</div>
      <form method=‘post’ action=contact.php’><pre>
      Name: <input type=‘text’  name=‘name’ />
      Email: <input type=‘text’ name=‘email’ />
     Username: <input type=‘text’ name=‘username’ />
     <input type = "submit" name = "submit" id = "submit" value = "contact" />
    </pre></form>

<?php
if (isset($_POST[‘name’]))
{
  $name = $_POST[‘name’];
  $email  = $_POST[‘email’];
  $username = $_POST[‘username’];

  echo “The data you entered was:<ul>” .
       "Name = $name<br />" .
       "Email = $email<br />" .
       "Username = $username</ul>";

}
?>



</body>




</html>
