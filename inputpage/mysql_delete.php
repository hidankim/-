<?php
   $server = "localhost";
   $user = "test";
   $port = "3306";
   $password = "1112";
   $database = "witheconomy_calendar";
   $submitValue = json_decode(file_get_contents('php://input'));

   $id = $submitValue[0];

   $con = mysqli_connect($server, $user, $password, $database, $port);

   $sql01 = 'DELETE FROM schedules WHERE id="'.$id.'"';
   $sql02 = 'SET @count=0';
   $sql03 = 'UPDATE schedules SET id=@count:=@count+1';

   mysqli_query($con, $sql01);
   mysqli_query($con, $sql02);
   mysqli_query($con, $sql03);

   mysqli_close($con);
?>