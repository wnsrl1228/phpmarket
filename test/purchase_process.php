<?php
  // 구매물건 구매목록에 추가
  $con = mysqli_connect("localhost","root","autoset","web_db");
  if(mysqli_connect_errno()){
    echo "MySQL연결 실패".mysqli_connect_errno();
  }
  session_start();

  $userid =  $_SESSION['userid'];
  $itemId = htmlspecialchars($_GET['itemId']);
  $count = htmlspecialchars($_POST['count']);

  echo $count;
  $spl = "INSERT INTO purchase_list(tracking_num,user_id,item_id,purchase_quantity)VALUE(DATE_FORMAT(now(),'%Y%m%d%H%i%s'),'$userid','$itemId','$count')";
  mysqli_query($con,$spl);

  mysqli_close($con);
  echo "
      <script>
      alert('구매가 완료되었습니다');
        location.href = 'main.php';
      </script>
      ";

 ?>
