<?php 
$server = "192.168.200.136";
$user = "subroot";
$port = "3308";
$password = "014916";
$database = "witheconomy_calendar";

$con = mysqli_connect($server, $user, $password, $database, $port);

$title = $_POST["name"];
$description = $_POST["info"];
$subject = $_POST["subject"];
$datetime = $_POST["date"];
$time = $_POST["period"];

$sql = "INSERT INTO middle_1_1(title, description, subject, datetime, time) VALUES('$title','$description', '$subject', '$datetime', '$time')";

$result = mysqli_query($con, $sql);
mysql_close($con);
?>