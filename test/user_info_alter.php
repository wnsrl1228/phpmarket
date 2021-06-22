<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>회원가입</title>
    <style media="screen">
      button{
        width: 40px;
        height: 30px;
        font-size: 12px;
      }
      tr{border-bottom: 1px solid lightgrey;}
      td:first-child{
      border-right: 1px solid lightgrey;
      }

    </style>
  </head>
  <body>
    <header>
      <div style="text-align:center;">
          <a href="main.php" style="color:black;font-size:30px;font-weight:bold;">물건 파는 사이트</a>
      </div>
    </header>
    <?php
    $con = mysqli_connect("localhost","root","autoset","web_db");
    if(mysqli_connect_errno()){
      echo "MySQL연결 실패".mysqli_connect_errno();
    }
    session_start();
    $userid = $_SESSION['userid'];
    if(!$userid){
      echo "
          <script>
            location.href = 'main.php';
          </script>
          ";
    }

    $sql = "SELECT * from user_info where user_id='$userid'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
      $userName = $row['name'];
      $userEmail = $row['email'];
      $userPhoneNo = $row['phone_no'];
    }


     ?>
     <script type="text/javascript">
       function nameAlter(){
         var newname = document.infoAlter.new_name.value;
         location.href='user_info_alter_process.php?name='+newname+'&email=1&phoneno=1&delete=1';
       }
       function emailAlter(){
         var newemail = document.infoAlter.new_email.value;
         location.href='user_info_alter_process.php?name=1&email='+newemail+'&phoneno=1&delete=1';
       }
       function phoneNoAlter(){
         var newphoneno = document.infoAlter.new_phone_no.value;
         location.href='user_info_alter_process.php?name=1&email=1&phoneno='+newphoneno+'&delete=1';
       }
       function deleteUser(){
         var select = confirm("정말로 계정을 삭제하시겠습니까?")
         if(select){
           location.href='user_info_alter_process.php?name=1&email=1&phoneno=1&delete=true';;
         }else{
           return false;
         }
       }
     </script>
      <center style="margin-top:150px;">
        <h2>회원 정보 수정</h2>
        <table style="width:350px;height:300px;border-collapse:collapse;" cellpadding='10'>
          <form name='infoAlter'>
            <tr>
              <td>아이디</td>
              <td><?=$userid?></td>
              <td></td>
            </tr>
            <tr>
              <td>이름</td>
              <td><input type="text" name='new_name' value='<?=$userName?>' required></td>
              <td><button type="button" onclick="nameAlter()">수정</button></td>
            </tr>
            <tr>
              <td>이메일</td>
              <td><input type="email" name='new_email' value='<?=$userEmail?>'required</td>
              <td><button type="button" onclick="emailAlter()">수정</button></td>
            </tr>
            <tr>
              <td>전화번호</td>
              <td><input type='text' name='new_phone_no' value='<?=$userPhoneNo?>' pattern="[0-9]{11}"required</td>
              <td><button type="button" onclick="phoneNoAlter()">수정</button></td>
            </tr>
            <tr style="border:0px">
              <td style="border:0px;">
                <button style="width:80px;" type="button" onclick="deleteUser()">계정삭제</button>
              </td>
              <td colspan="2" align="center"><button type="button"style="width:80px;" onclick="return location.href='main.php'">돌아가기</butotn></td>
            </tr>

          </form>
        </table>
      </center>


  </body>
</html>
