<?php
//DB초기작업
$con = mysqli_connect("localhost","root","autoset","web_db");
if(mysqli_connect_errno()){
  echo "MySQL연결 실패".mysqli_connect_errno();
}

// 데이터 받기
$item_name= mysqli_real_escape_string($con,$_POST['sellItemName']);
$item_price= mysqli_real_escape_string($con,$_POST['sellItemPrice']);
if(isset($_POST['sellIsMember'])){
  $is_member = 1;
}else{
  $is_member=0;
}
$target_dir = "F:/AutoSet10/public_html/img/";
$target_file = $target_dir . basename($_FILES["sellfile"]["name"]);

if (!move_uploaded_file($_FILES["sellfile"]["tmp_name"], $target_file)) { //임시파일을 target_file로 저장시킴
    echo "오류가 발생하여 업로드 실패!";
    header('location:'.$prevPage);
  }
$item_image = "../img/".basename($_FILES["sellfile"]["name"]);
session_start();
$userid = $_SESSION['userid'];
$sql = "INSERT INTO item_info(item_image,item_name,item_price,item_recommend_count,is_member,seller_id)
VALUE('$item_image','$item_name','$item_price','0','$is_member','$userid')";
if(!mysqli_query($con,$sql)){
  die('Error:'.mysqli_error($con));
}
echo "
    <script>
      alert('등록이 완료되었습니다.');
      location.href = 'main.php';
    </script>
    ";
mysqli_close($con);
?>
