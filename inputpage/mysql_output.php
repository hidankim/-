<?php
   $server = "localhost";
   $user = "root";
   $port = "3306";
   $password = "rBXAm7WN";
   $database = "witheconomy_calendar";
   $datetime = $_POST["html variable"]; //방법: index.html에 연결된 javascript에 html의 버튼을 누르면 자동으로 지금 가리키고 있는 날짜를 form tag의 post 형식으로 보내줄 수 있는 코드를 작성해야 함 (input.html과 mysql_input.php를 연결한 방식과 비슷하게)

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