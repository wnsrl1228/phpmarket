<?php
  session_start();
  unset($_SESSION["username"]);

  echo "<script>alert('로그아웃하였습니다.');</script>";

  echo "
       <script>
          location.href = 'main.php';
       </script>
      ";

 ?>
