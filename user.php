<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hardcore Tackle</title>

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

#input {
    
    outline: none; 
    margin-left: 10px;
    margin-right: 10px;
    width: 200px;
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
    <div data-role="page" id="user" data-position="fixed" data-add-back-btn="true"> <!-- CONTACT PAGE -->
      <div data-role="header">
        <h1>User Registration</h1>
      </div>

      

      <div class="container" id="form">
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


      <div class="container" id="myTable">
            <a href="test.php">FishLog</a>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>First</th>
                  <th>Last</th>
                  <th>Username</th>
                  <th>Email Address</th>
                  <th>Password</th>
                  <th>isAdmin?</th>
                </tr>
              </thead>
              <tbody>
              <?php
               include 'database.php';
               $pdo = Database::connect();
               $sql = 'SELECT * FROM hc_users ORDER BY id DESC';
               foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['first'] . '</td>';
                        echo '<td>'. $row['last'] . '</td>';
                        echo '<td>'. $row['username'] . '</td>';
                        echo '<td>'. $row['email'] . '</td>';
                        echo '<td>'. $row['password'] . '</td>';
                        echo '<td>'. $row['isAdmin'] . '</td>';
                        echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
                        echo '</tr>';
               }
               Database::disconnect();
              ?>
              </tbody>
              <a href="create.php">CheckOutUSers</a>
        </table>
      </div>
<?php
//require database.php;
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
 // header("Location: user.php");
}
?>
</body>
</html>
