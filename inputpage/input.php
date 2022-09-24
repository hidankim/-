<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./testinput.css?ver=13">
    <title>Input01</title>
</head>
<body>
    <div class="main">
      <div class="loader" id="loader"></div>
      <div class="home-button">
        <a href="../login.html">
          <img src="../pictures/home button black.png">
        </a>
      </div>
      <div class="contents">
        <div class="content-wrap">
          <p id="content"></p>
        </div>


        <div class="content-left">
          <div class="todo-wrap">
              <form action="mysql_input.php?ver=1" method="post">
                <div class="container" id="container">
                      <h1>Add Task</h1>

                      <div>
                        <div>
                          <label for="subject" class="label"><b>과목</b></label>
                          <input type="text" name="subject" required>
                        </div>
                      </div>

                      <div>
                        <div>
                          <label for="date" class="label"><b>날짜</b></label>
                          <input type="date" name="date" required>
                        </div>
                      </div>

                      <div>
                        <div>
                          <label for="period" class="label"><b>교시</b></label>
                          <select name="period" required>
                            <option value="1교시">1교시</option>
                            <option value="2교시">2교시</option>
                            <option value="3교시">3교시</option>
                            <option value="4교시">4교시</option>
                            <option value="5교시">5교시</option>
                            <option value="6교시">6교시</option>
                            <option value="7교시">7교시</option>
                            <option value="8교시">8교시</option>
                            <option value="그외">외</option>
                          </select>
                        </div>
                      </div>

                      <div>
                        <div>
                          <label for="name" class="label"><b>제목</b></label>
                          <input type="text" name="name" required>
                        </div>
                      </div>

                      <div>
                        <div>
                          <label for="info" class="label"><b>정보</b></label>
                          <input type="text" name="info" required>
                        </div>
                      </div>

                      <div>
                      <button type="submit" id="submitBtn">제출</button>
                      </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <script defer src="./input.js?ver=7"></script>
</body>
</html>