<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      li{list-style:none;font-weight: bold;}
    </style>
  </head>
  <body>
    <center>
    <h2>아이디 중복 체크</h2>
    <hr>
    <?php
    $id =htmlspecialchars($_GET["id"]);
      $con = mysqli_connect("localhost","root","autoset","web_db");
      if(mysqli_connect_errno()){
        echo "MySQL연결 실패".mysqli_connect_errno();
      }
      $sql = "select * from user_info where user_id = '$id'";
      $result = mysqli_query($con,$sql);
      $num_record = mysqli_num_rows($result);
      if($num_record){
        echo "<li>이미 사용 중인 아이디 입니다.</li>";
      }else{
        echo "<li>".$id." 는 사용 가능한 아이디입니다.</li>";
        ?>

        <!-- 중복체크여부 -->
        <script type="text/javascript">
        opener.document.all.checkid.value=1;

        </script>
        <?php
      }
      mysqli_close($con);

     ?>
     <input type="button" onclick="javascript:self.close()" value="닫기" style="width:60px;height:25px;margin-top:50px;">
     </center>
  </body>
</html>
