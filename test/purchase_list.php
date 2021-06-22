<?php
$con = mysqli_connect("localhost","root","autoset","web_db");
if(mysqli_connect_errno()){
  echo "MySQL연결 실패".mysqli_connect_errno();
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>구매목록</title>
    <style media="screen">
      div.puchase_position{
        width:1200px;
        height:600px;
        position: absolute;
        top: 60%;
        left: 50%;
        transform:translate(-50%,-60%);
        border-radius: solid 1px gray;
      }
      .puchase_position > td,tr{
        font-size: 18px;
        text-align:center;
      }
      tr{
         border-bottom:1px solid black;
      }

    </style>
  </head>
  <body style="margin:0px;">
    <?php
      // 로그인부분
      include_once 'lib/header_part.php';
      if(!$userid){
        echo "
            <script>
              location.href = 'main.php';
            </script>
            ";
      }
    ?>

    <div style="width:100%;height:800px;;position:relative;overflow:auto">
      <div class="puchase_position" >
        <table align="center"width="1100" style="border-collapse:collapse;">
          <tr>
            <th>운송번호</th><th>물건</th><th>물건 이름</th><th>가격</th><th>회원할인여부</th><th>수량</th>
          </tr>
            <?php

              //구매리스트
              $sql = "SELECT * FROM purchase_list WHERE user_id = '$userid'";
              $result = mysqli_query($con,$sql);
              $num_match = mysqli_num_rows($result);
              if(!$num_match){
                echo "<tr height='600px'><td colspan='6'><h1>구매한 물건이 없습니다</h1></td></tr>";

              }
              else{
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  $itemId = $row['item_id'];
                  $sql = "SELECT * FROM item_info WHERE item_id ='$itemId'";
                  $result2 = mysqli_query($con,$sql);
                    while($row2 = mysqli_fetch_array($result2)){
                      $itemImage = $row2['item_image'];
                      $itemName = $row2['item_name'];
                      $itemPrice = $row2['item_price'];
                      $isMember = $row2['is_member'];
                    }

                    $trackingNum =  $row['tracking_num'];
                    $purcharQuantity = $row['purchase_quantity'];
                    echo "<td>".$trackingNum."</td>";
                    echo "<td><img src='".$itemImage."' width='200'height='230' style='object-fit:contain;margin-left:10%;' ></td>";
                    echo "<td>".$itemName."</td>";
                    echo "<td>".$itemPrice."원</td>";
                    if($isMember==1){
                      echo "<td>회원할인가능</td>";
                    }else{
                      echo "<td>회원할인불가</td>";
                    }

                    echo "<td>".$purcharQuantity."</td>";

                  }

              }


                ?>

       </table>
      </div>
    </div>

    <?php
      // footer부분
      include_once 'lib/footer_part.html';
      mysqli_close($con);
    ?>
  </body>
</html>
