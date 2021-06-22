<?php
$con = mysqli_connect("localhost","root","autoset","web_db");
if(mysqli_connect_errno()){
  echo "MySQL연결 실패".mysqli_connect_errno();
}
$id= mysqli_real_escape_string($con,$_POST['user_id']);
$passwd= mysqli_real_escape_string($con,$_POST['user_pwd']);
$name= mysqli_real_escape_string($con,$_POST['user_name']);
$email= mysqli_real_escape_string($con,$_POST['user_email']);
$phone_no= mysqli_real_escape_string($con,$_POST['user_phone_no']);

$sql = "INSERT INTO user_info(user_id,pwd,name,email,phone_no)
VALUE('$id','$passwd','$name','$email','$phone_no')";
if(!mysqli_query($con,$sql)){
  die('Error:'.mysqli_error($con));
}
mysqli_close($con);
 ?>

    <script>
      alert("회원가입에 성공하였습니다. 로그인해 주세요.");
      location.href = 'main.php';
    </script>
