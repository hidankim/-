<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <title>Input01</title>
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
            <p id="content"></p>
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
                        <option value="middle_1_1">middle_1_1</option>
                        <option value="middle_1_2">middle_1_2</option>
                        <option value="middle_1_3">middle_1_3</option>
                        <option value="middle_1_4">middle_1_4</option>
                        <option value="middle_2_1">middle_2_1</option>
                        <option value="middle_2_2">middle_2_2</option>
                        <option value="middle_2_3">middle_2_3</option>
                        <option value="middle_2_4">middle_2_4</option>
                        <option value="middle_3_1">middle_3_1</option>
                        <option value="middle_3_2">middle_3_2</option>
                        <option value="middle_3_3">middle_3_3</option>
                        <option value="middle_3_4">middle_3_4</option>
                        <option value="high_1_1">high_1_1</option>
                        <option value="high_1_2">high_1_2</option>
                        <option value="high_1_3">high_1_3</option>
                        <option value="high_1_4">high_1_4</option>
                        <option value="high_2_1">high_2_1</option>
                        <option value="high_2_2">high_2_2</option>
                        <option value="high_2_3">high_2_3</option>
                        <option value="high_2_4">high_2_4</option>
                        <option value="high_3_1">high_3_1</option>
                        <option value="high_3_2">high_3_2</option>
                        <option value="high_3_3">high_3_3</option>
                        <option value="high_3_4">high_3_4</option>
                      </select>
                      </div>

                      <div>
                      <button type="submit">제출</button>
                      </div>
                </div>
              </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        async function fetchPage(){
          //var submitValue = document.getElementById("Current-year-month").value+"-"+document.getElementById("main-date");
          var submitValue = ["between \"2022-09-01\" and \"2022-9-30\"", "high_2_1", "./json"];

          await fetch("./calendars/output.php", {
            method:"post",
            headers:{"Content-Type":"application/json; charset=UTF-8"},
            body:JSON.stringify(submitValue)
          });

          var text = await fetch("./test_json?ver=1").then(res => res.text().then(res => {
            res = JSON.parse(res);

            for(var i = 0 ; i < res.length ; i++)
            {
              res[i] = JSON.parse(res[i]);
            }

            return res;
          }));

          console.log(text);

          let value = "<table border=\"1\"><th>제목</th><th>내용</th><th>과목</th><th>날짜</th><th>교시</th>";
          for(var i = 0 ; i < text.length ; i++)
          {
            value += "<tr>"
            for(var j in text[i])
            {
              value += "<td>"+text[i][j]+"</td>";
            }
            value += "</tr>";
          }
          value += "</table>";

          document.getElementById("content").innerHTML = value;
        }

        fetchPage();

        document.addEventListener('submit', async (e) => {
          e.preventDefault();

          const form = e.target;
      
          await fetch(form.action, {
            method: form.method,
            body: new FormData(form)
          });

          await fetchPage();
        });
      </script>
</body>
</html>