<?php
   $server = "localhost";
   $user = "test";
   $port = "3306";
   $password = "1112";
   $database = "witheconomy_calendar";
   $submitValue = json_decode(file_get_contents('php://input'));

   $datetime = $submitValue[0];
   $classname = $submitValue[1];
   $storage = $submitValue[2];

   $con = mysqli_connect($server, $user, $password, $database, $port);

   $sql = "SELECT title, description, subject, datetime, time, id FROM schedules WHERE datetime ".$datetime." && classname=\"".$classname."\" ORDER BY datetime asc";

   $result = mysqli_query($con, $sql);

   $row = array();
   while($subrow = mysqli_fetch_row($result))
   {
      $object = '{"title":"'.$subrow[0].'", "description":"'.$subrow[1].'", "subject":"'.$subrow[2].'", "datetime":"'.$subrow[3].'", "time":"'.$subrow[4].'", "id":"'.$subrow[5].'"}';
      array_push($row, $object);
   }

   $json = json_encode($row);
   $bytes = file_put_contents($storage, $json);

   mysqli_close($con);
?>