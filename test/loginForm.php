<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/loginForm.css">
    <title>로그인</title>
  </head>
  <body>

    <header>
      <div style="text-align:center">
          <a href="main.php" style="color:black;font-size:30px;font-weight:bold;">물건 파는 사이트</a>
      </div>
      <center style="margin-top:100px;">
        <form action="loginForm_process.php" method="post">
          <ul style="list-style:none;padding-left: 0px;">
            <li class="hint">아이디</li>
            <li><input class="login_size" type="text" name="id" placeholder="아이디" required ></li>
            <li>&nbsp</li>
            <li class="hint">비밀번호</li>
            <li><input class="login_size" type="password" name="pass" placeholder="비밀번호" required ></li>
            <li>&nbsp</li><li>&nbsp</li>
            <li><input class="login_button" type="submit" value="로그인"></li>
            <li><hr width="400px" ></li>
            <li><input class="login_button" style="background:white;color:black"type="button" value="회원가입" onClick="location.href='signUp.php'" </li>
          </ul>
        </form>
      </center>
    </header>

  </body>
</html>
