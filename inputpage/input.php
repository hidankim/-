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
      <div class="loader" id="loader"></div>
      
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
                      <button type="submit" id="submitBtn">제출</button>
                      </div>
                </div>
              </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function startLoading()
        {
          let load = document.createElement("style");
          load.setAttribute("type", "text/css");
          load.innerHTML = ".loader{ border: 16px solid #f3f3f3; border-top: 16px solid #3498db; border-radius: 50%; width: 120px; height: 120px; animation: spin 1.5s linear infinite; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); } @keyframes spin{0% {transform: translate(-50%, -50%) rotate(0deg);} 100% {transform: translate(-50%, -50%) rotate(360deg);}}";
          document.getElementById("loader").appendChild(load);
        }

        function stopLoading()
        {
          var cell = document.getElementById("loader");

          while ( cell.hasChildNodes() )
          {
               cell.removeChild( cell.firstChild );       
          }
        }

        async function fetchPage(){
          document.getElementById("submitBtn").setAttribute("disabled", "disabled");
          startLoading();
          //var submitValue = document.getElementById("Current-year-month").value+"-"+document.getElementById("main-date");
          var submitValue = ["between \"2022-09-01\" and \"2022-9-30\"", "high_2_1", "./json"];

          await fetch("./mysql_output.php", {
            method:"post",
            headers:{"Content-Type":"application/json; charset=UTF-8"},
            body:JSON.stringify(submitValue)
          });

          var text = await fetch("./json").then(res => res.text().then(res => {
            res = JSON.parse(res);

            for(var i = 0 ; i < res.length ; i++)
            {
              res[i] = JSON.parse(res[i]);
            }

            return res;
          }));

          console.log(text);

          let value = "<table border=\"1\"><th>제목</th><th>내용</th><th>과목</th><th>날짜</th><th>교시</th><th>삭제</th>";
          for(var i = 0 ; i < text.length ; i++)
          {
            value += "<tr>";
            for(var j in text[i])
            {
              if(j !== "id"){
                value += "<td>"+text[i][j]+"</td>";
              }
            }
            value += "<td><button class=\"deleteBtn\" id=\""+text[i]["id"]+"\" onclick=\"deleteInfo(this.id)\"> X </button></td></tr>";
          }
          value += "</table>";

          document.getElementById("content").innerHTML = value;
          stopLoading();
          document.getElementById("submitBtn").removeAttribute("disabled");
        }
        fetchPage();

        document.addEventListener('submit', async (e) => {
          e.preventDefault();
          startLoading();
          document.getElementById("submitBtn").setAttribute("disabled", "disabled");

          const form = e.target;
      
          await fetch(form.action, {
            method: form.method,
            body: new FormData(form)
          });

          await fetchPage();
          stopLoading();
          document.getElementById("submitBtn").removeAttribute("disabled");
        });

        async function deleteInfo(id)
        {
          startLoading();
          document.getElementById("submitBtn").setAttribute("disabled", "disabled");
          document.getElementById(id).setAttribute("disabled", "disabled");

          await fetch("./mysql_delete.php", {
            method:'post',
            headers:{"Content-Type":"application/json; charset=UTF-8"},
            body:JSON.stringify([id])
          });

          await fetchPage();
          stopLoading();
          document.getElementById("submitBtn").removeAttribute("disabled");
        }
      </script>
</body>
</html>