<?php
  $id = htmlspecialchars($_POST["id"]);
  $pass =htmlspecialchars($_POST["pass"]);
  $con = mysqli_connect("localhost","root","autoset","web_db");
  $sql = "select * from user_info where user_id='$id'";
  $result = mysqli_query($con,$sql);
  $num_match = mysqli_num_rows($result);

  if(!$num_match){
    echo "
         <script>
            window.alert('등록되지 않은 아이디 입니다!');
            history.go(-1);
         </script>
        ";
  }else{
    $row = mysqli_fetch_array($result);
    $db_pass = $row["pwd"];

    mysqli_close($con);

    if($pass !=$db_pass){
      echo "
          <script>
            window.alert('비밀번호가 틀립니다!');
            history.go(-1);
          </script>
          ";
    }else{
      session_start();
      $_SESSION['username'] = $row["name"];
      $_SESSION['userid'] = $row["user_id"];
      echo("
          <script>
            location.href = 'main.php';
          </script>
          ");
    }
  }

 ?>
