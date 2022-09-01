<?php
   $server = "localhost";
   $user = "root";
   $port = "3306";
   $password = "rBXAm7WN";
   $database = "witheconomy_calendar";
/*
   $classDatetimeInfo = json_decode(file_get_contents('php://input'));

   $loc = strpos($classDatetimeInfo, ",") - strlen($classDatetimeInfo);

   $classname = substr($classDatetimeInfo, -strlen($classDatetimeInfo), $loc);
   $datetime = substr($classDatetimeInfo, $loc+1);
*/
   $datetime = "2022-08-29";
   $classname = "high_2_1";

   $con = mysqli_connect($server, $user, $password, $database, $port);

   $sql = "SELECT title, description, subject, datetime, time FROM schedules WHERE datetime=\"".$datetime."\" && classname=\"".$classname."\"";

   $result = mysqli_query($con, $sql);

   $row = array();
   while($subrow = mysqli_fetch_row($result))
   {
      $object = '{"title":"'.$subrow[0].'", "description":"'.$subrow[1].'", "subject":"'.$subrow[2].'", "datetime":"'.$subrow[3].'", "time":"'.$subrow[4].'"}';
      array_push($row, $object);
   }

   $json = json_encode($row);
   $bytes = file_put_contents("convert_json", $json);

   mysqli_close($con);
?>