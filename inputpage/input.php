<?php
   $server = "localhost";
   $user = "root";
   $port = "3306";
   $password = "rBXAm7WN";
   $database = "witheconomy_calendar";
   $datetime = "2022-08-27";

   $con = mysqli_connect($server, $user, $password, $database, $port);

   $sql = "SELECT * FROM schedules WHERE datetime=\"".$datetime."\""; 

   $result = mysqli_query($con, $sql);

   $row = array();
   while($subrow = mysqli_fetch_row($result))
   {
      array_push($row, $subrow);
   }

   mysql_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <title>Input04</title>
</head>
<body>
    <div class="main">
      
      <div class="home-button">
        <a href="login.html">
          <img src="./pictures/home button 7476c0.png">
        </a>
      </div>

        <div class="content-wrap">
          <div class="content-right">
          </div>
        </div>


        <div class="content-left">
          <div class="todo-wrap">
              <form action="mysql_input.php" method="post">
                <div class="container">
                      <h1>Add Task</h1>

                      <div>
                      <label for="subject"><b>과목</b></label>
                      <input type="text" name="subject" required>
                      </div>

                      <div>
                      <label for="date"><b>날짜</b></label>
                      <input type="date" name="date" required>
                      </div>

                      <div>
                      <label for="period"><b>교시</b></label>
                      <select name="period" required>
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                        <option value="four">4</option>
                        <option value="five">5</option>
                        <option value="six">6</option>
                        <option value="seven">7</option>
                        <option value="eight">8</option>
                        <option value="other">외</option>
                      </select>
                      </div>

                      <div>
                      <label for="name"><b>제목</b></label>
                      <input type="text" name="name" required>
                      </div>

                      <div>
                      <label for="info"><b>정보</b></label>
                      <input type="text" name="info" required>
                      </div>

                      <div>
                      <label for="classname"><b>반</b></label>
                      <select name="classname" required>
                        <option value="middle_1_1">011</option>
                        <option value="middle_1_2">012</option>
                        <option value="middle_1_3">013</option>
                        <option value="middle_1_4">014</option>
                        <option value="middle_2_1">021</option>
                        <option value="middle_2_2">022</option>
                        <option value="middle_2_3">023</option>
                        <option value="middle_2_4">024</option>
                        <option value="middle_3_1">031</option>
                        <option value="middle_3_2">032</option>
                        <option value="middle_3_3">033</option>
                        <option value="middle_3_4">034</option>
                        <option value="high_1_1">111</option>
                        <option value="high_1_2">112</option>
                        <option value="high_1_3">113</option>
                        <option value="high_1_4">114</option>
                        <option value="high_2_1">121</option>
                        <option value="high_2_2">122</option>
                        <option value="high_2_3">123</option>
                        <option value="high_2_4">124</option>
                        <option value="high_3_1">131</option>
                        <option value="high_3_2">132</option>
                        <option value="high_3_3">133</option>
                        <option value="high_3_4">134</option>
                      </select>
                      </div>

                      <div>
                      <input type="submit" name="create" value="확인">
                      </div>
                </div>
              </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        var js_array = <?php echo json_encode($row)?>;
        console.log(js_array);
      </script>
</body>
</html>