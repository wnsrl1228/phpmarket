<?php
session_start();
$userid = $_SESSION['userid'];

$con = mysqli_connect("localhost","root","autoset","web_db");
if(mysqli_connect_errno()){
  echo "MySQL연결 실패".mysqli_connect_errno();
}
if($_GET['delete']=='true'){
  $sql = "DELETE FROM user_info where user_id='$userid'";
  mysqli_query($con,$sql);
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  echo "
      <script>
        alert('계정이 삭제되었습니다.');
        location.href='main.php';
      </script>
      ";
}
if($_GET['name']!=1){
  $name = htmlspecialchars($_GET['name']);
  $sql = "UPDATE user_info SET name='$name' WHERE user_id='$userid'";
  mysqli_query($con,$sql);
}elseif($_GET['email']!=1){
  $email = htmlspecialchars($_GET['email']);
  $sql = "UPDATE user_info set email='$email' where user_id='$userid'";
  mysqli_query($con,$sql);
}elseif($_GET['phoneno']!=1){
  $phone_no = htmlspecialchars($_GET['phoneno']);
  $sql = "UPDATE user_info set phone_no='$phone_no' where user_id='$userid'";
  mysqli_query($con,$sql);
}
echo "
    <script>
      alert('정보가 수정되었습니다');
      history.go(-1);
    </script>
    ";


mysqli_close($con);



 ?>
