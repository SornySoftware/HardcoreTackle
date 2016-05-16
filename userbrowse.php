<!DOCTYPE html>
<html>
<head>
  <title>Check Out Users!</title>
<meta Name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link href="CSS/style.css" rel="stylesheet" type="text/css">
<link href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js" type="text/javascript"></script>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->

<link href="CSS/style.css" rel="stylesheet" type="text/css">
</head>
<body data-role="page" data-theme="a">
  <div data-role="header" data-theme="a" data-add-back-btn="true" data-position="fixed">
    <h3>Browse Users!</h3>
  </div>

  <div class="container" id="myTable" data-role="content">
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
    </table>
  </div>
  <div data-role="footer">
    <nav data-role="navbar">
    <ul>
        <li><a data-icon="home" data-theme="a" onClick="window.location.href = 'Untitled-1.html';">Home</a></li>
    </ul>
    </nav>
  </div>
</body>
</html>



