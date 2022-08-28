<?php
   $server = "localhost";
   $user = "root";
   $port = "3306";
   $password = "rBXAm7WN";
   $database = "witheconomy_calendar";
   $classDatetimeInfo = $_POST["DB_data"]; //방법: index.html에 연결된 javascript에 html의 버튼을 누르면 자동으로 지금 가리키고 있는 날짜를 form tag의 post 형식으로 보내줄 수 있는 코드를 작성해야 함 (input.html과 mysql_input.php를 연결한 방식과 비슷하게)

   $loc = strpos($classDatetimeInfo, ",") - strlen($classDatetimeInfo);

   $classname = substr($classDatetimeInfo, -strlen($classDatetimeInfo), $loc);
   $datetime = substr($classDatetimeInfo, $loc+1);

   $con = mysqli_connect($server, $user, $password, $database, $port);

   $sql = "SELECT * FROM ".$classname." WHERE datetime=\"".$datetime."\""; 

   $result = mysqli_query($con, $sql);

   $row = array();
   while($subrow = mysqli_fetch_row($result))
   {
      array_push($row, $subrow);
   }

   echo "test";
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title></title>
</head>
<body>
   <form action="mysql_output.php" method="post">
      <button class='buttons' id='submitBtn' type="submit" onclick="submitScore()">SUBMIT</button>
      <input type="hidden" id="DB_data" name="DB_data" value="">
   </form>
   <script type="text/javascript">
      var js_array = <?php echo json_encode($row)?>;
      function submitScore(){
         document.getElementById('username').value = username;
      }
   </script>
</body>
</html>
