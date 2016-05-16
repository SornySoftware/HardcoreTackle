<?php
session_start();
if(isset($_POST['btnLog']) ){

$wCond = $_POST['wCond'];
$wWind = $_POST['wWind'];
$wMoon = $_POST['wMoon'];
$wTemp = $_POST['wTemp'];
$location = $_POST['location'];

$_SESSION["wCond"] = $_POST['wCond'];
$_SESSION["wWind"] = $_POST['wWind'];
$_SESSION["wMoon"] = $_POST['wMoon'];
$_SESSION["wTemp"] = $_POST['wTemp'];
$_SESSION["location"] = $_POST['location'];
    header('Location:test.php');
       //window.location('test.php');
}
?>