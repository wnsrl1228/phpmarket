<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/loginForm.css">
    <title>회원가입</title>
  </head>
  <body>
    <script type="text/javascript">
      // 아이디 중복체크 및 비밀번호 확인 검사
      function pwd_check(){
        var checkid=document.userform.checkid.value;
        if(checkid==0){
          alert("ID 중복체크를 하세요!");
          return false;
        }

        if(document.userform.user_pwd.value!=document.userform.user_pwd_check.value){
          alert("비밀번호와 비밀번호 확인이 다릅니다. ");
          return false;
        }else{
          return true;
        }

      }
      // 아이디 형식검사
      function check_id(){
        if(!document.userform.user_id.value){
          alert("아이디를 입력해 주세요");
          document.userform.user_id.focus();
          return;
        }if(document.userform.user_id.value.length < 6 ||document.userform.user_id.value.length>15){
          alert("글자수를 확인해 주세요.");
          document.userform.user_id.focus();
          return;
        }
        var pattern_spc = /[~!@#$%^&*()_+|<>?:{}]/;
        if(pattern_spc.test(document.userform.user_id.value)){
          alert("특수문자를 제거해주세요");
          document.userform.user_id.focus();
          return;
        }
        var pattern_kor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
        if(pattern_kor.test(document.userform.user_id.value)){
          alert("잘못된 형식입니다.");
          document.userform.user_id.focus();
          return;
        }
        window.open("signUp_check_id.php?id="+document.userform.user_id.value,"IDcheck","left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes")
      }

    </script>

    <header>
      <div style="text-align:center">
          <a href="main.php" style="color:black;font-size:30px;font-weight:bold;">물건 파는 사이트</a>
      </div>
    </header>
      <center style="margin-top:150px;">
        <form name="userform" action="signUp_process.php" method="post" onsubmit="return pwd_check()">
          <ul style="list-style:none;padding-left: 0px;">

            <li class="hint">아이디</li>
            <input class="login_size" style="width:290px" type="text" name="user_id" placeholder="아이디(영문자, 숫자 포함 6~15글자)" pattern="[A-za-z0-9]{6,15}" required >
            <input type="button" onclick="check_id()" value="중복체크" style="width:67px;height:50px;">
            <li>&nbsp</li>
            <input type="hidden" name="checkid" value=0>
            <li class="hint">비밀번호</li>
            <li><input class="login_size" type="password" name="user_pwd" placeholder="비밀번호(8자 이상)" minlength="8" required ></li>
            <li>&nbsp</li>

            <li class="hint">비밀번호 확인</li>
            <li><input class="login_size" type="password" name="user_pwd_check" placeholder="비밀번호 확인" required ></li>
            <li>&nbsp</li>

            <li class="hint">이름</li>
            <li><input class="login_size" type="text" name="user_name" placeholder="이름" required ></li>
            <li>&nbsp</li>

            <li class="hint">이메일</li>
            <li><input class="login_size" type="email" name="user_email" placeholder="이메일" required ></li>
            <li>&nbsp</li>

            <li class="hint">휴대폰 번호</li>
            <li><input class="login_size" type="text" name="user_phone_no" placeholder="휴대폰 번호" pattern="[0-9]{11}" required ></li>
            <li>&nbsp</li><li>&nbsp</li>

            <li><input class="login_button" type="submit" value="가입하기"></li>
            <li><hr width="400px" ></li>

            <li><input class="login_button" style="background:white;color:black"type="submit" value="돌아가기" onClick="location.href='main.php'"></li>
          </ul>
        </form>
      </center>


  </body>
</html>
