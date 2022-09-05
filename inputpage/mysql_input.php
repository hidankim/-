<?php 
$server = "192.168.1.103";
$user = "test";
$port = "3306";
$password = "1112";
$database = "witheconomy_calendar";

$con = mysqli_connect($server, $user, $password, $database, $port);

$title = $_POST["name"];
$description = $_POST["info"];
$subject = $_POST["subject"];
$datetime = $_POST["date"];
$time = $_POST["period"];
$classname = $_POST["classname"];

$sql = "INSERT INTO schedules(title, description, subject, datetime, time, classname) VALUES('$title','$description', '$subject', '$datetime', '$time', '$classname')";

$result = mysqli_query($con, $sql);
mysqli_close($con);
?>