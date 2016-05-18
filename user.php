<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hardcore Tackle</title>

<meta Name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link rel="stylesheet" href="CSS/themes/default/jquery.mobile-1.4.5.min.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>



<link href="CSS/style.css" rel="stylesheet" type="text/css">

<!-- Latest compiled and minified CSS
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
<!-- Latest compiled and minified JavaScript -->

</head>

<style rel="stylesheet" type="text/css">

#input {
    
    outline: none; 
    margin-left: 10px;
    margin-right: 10px;
} 

#myTable {
  float: right;
  overflow: hidden;
}

#form {
  float: left;
  overflow: hidden;
}




.formButton {
  width: 300px;
}
</style>






<body>   
    <div data-role="page" id="user" data-position="fixed" data-add-back-btn="true"> <!-- USER PAGE -->
      <div data-role="header">
        <h1>User Registration</h1>
      </div>    

      <div data-role="content" id="form" data-theme="a">
            <form method='post' action='user.php'>
            <div class="formInput" id="input">
            <div>First: <input type='text' Name='first' required="required" value="test" placeholder="" /></div>
            <div>Last: <input type='text' Name='last' required="required" value="test" placeholder="" /></div>
            <div>Username: <input type='text' Name='username'  required="required" value="test" placeholder="Enter a username" /></div>
            <div>Email: <input type='text' Name='email' required="required" value="test" placeholder="example@test.com" /></div>
            <div>Password:<input type="password" name="password" required="required" value="test"/></div>
            <div>Retype Password:<input type="password" name="cpassword" value="test" required="required"/></div>
            <div class="formButton"><Button type = "submit" Name = "submit" >Sign-Up</Button></div>
            </div>
            
            </form>
      </div>
<?php
include 'database.php';
if (isset($_POST['first']))
{
  $first = $_POST['first'];
  $last = $_POST['last'];
  $email  = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  echo "The data you entered was:<ul>" .
       "First = $first<br />" .
       "Last = $last<br />" .
       "Email = $email<br />" .
       "Password = $password<br />" .
       "UserName = $username</ul>";

  $message = "Got into php script!!!!";
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script type='text/javascript'>alert('$message');</script>";
    $sql = "INSERT INTO hc_users (first, last, email, username, password)  VALUES(?,?,?,?,?)";   
    $q = $pdo->prepare($sql);    
    $q->execute(array($first,$last,$email,$username,$password));  
  Database::disconnect();
  header("Location: user.php");
}
?>
  <div data-role="footer">
      <nav data-role="navbar">
      <ul>
          <li><a data-icon="home" data-theme="a" onClick="window.location.href = 'index.html';">Home</a></li>
      </ul>
      </nav>
  </div>
</body>
</html>
