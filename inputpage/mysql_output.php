<?php
   $server = "localhost";
   $user = "root";
   $port = "3306";
   $password = "rBXAm7WN";
   $database = "witheconomy_calendar";
   $datetime = "2022-08-27";

   $con = mysqli_connect($server, $user, $password, $database, $port);

   $sql = "SELECT * FROM middle_1_1 WHERE datetime=\"".$datetime."\"";

   $result = mysqli_query($con, $sql);

   $row = array();
   while($subrow = mysqli_fetch_row($result))
   {
      array_push($row, $subrow);
   }

   echo "test";
?>

<script type="text/javascript">
   var js_array = <?php echo json_encode($row)?>;
</script>