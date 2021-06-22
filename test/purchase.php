<?php
  session_start();
  if(isset($_SESSION['username']))$username = $_SESSION["username"];
  else $username="";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/purchase.css">
    <title>물건 파는 사이트</title>
    <script type="text/javascript">
    //수량 및 체크박스 컨트롤 함수 구현//
      function plus(){
        count = document.calcForm.count.value;
        price = document.calcForm.price.value;
        oldCount = count;
        count++;
        document.calcForm.count.value = count;
        document.calcForm.price.value = price/oldCount*count;
      }
      function sub(){
        count = document.calcForm.count.value;
        price = document.calcForm.price.value;
        if(count >1){
          oldPrice = price/count;
          count--;
          document.calcForm.price.value = oldPrice*count;
          document.calcForm.count.value = count;
        }
      }
      function check(box){
        price =document.calcForm.price.value;
        if(box.checked==true) {
          document.calcForm.price.value = price-(price*0.1);
        } else{
          document.calcForm.price.value =  price*(10/9);
        }
      }

    </script>
  </head>

  <body style="margin:0px">
    <?php
      // 로그인부분
      include_once 'lib/header_part.php';
    ?>



    <?php
    $itemId = htmlspecialchars($_GET['itemId']);
    $itemImage = htmlspecialchars($_GET['itemImage']);
    $itemName = htmlspecialchars($_GET['itemName']);
    $itemPrice = htmlspecialchars($_GET['itemPrice']);
    $itemRecommendCount = htmlspecialchars($_GET['itemRecommendCount']);
    $isMember = htmlspecialchars($_GET['isMember']);

     ?>
     <main>
       <img class='itemImage' src='<?=$itemImage?>'>
       <div class="item_info">
         <form name="calcForm" method="post" style="font-size:20px" action="purchase_process.php?itemId=<?=$itemId?>">
           <ul>
             <li class="item_name"><?=$itemName?></li>
             <li class="item_price"><input class="item_price_input" type="text" name="price" value="<?=$itemPrice; ?>" size="4" readonly>원</li>
             <li class="item_recommend_count"><?=$itemRecommendCount?><img class='testimg' src='https://littledeep.com/wp-content/uploads/2020/09/like-icon-style.png' width=30px height=30px valign='bottom'></li>
             <li style="border-bottom:0px;margin: 60px;">
               <table border="1 solid" cellpadding='0'cellspacing='0' style="background:white;border-color:lightgray">
                 <tr>
                   <td rowspan="2" > <input class="count_input" type="text" name="count" value="1" size="1" readonly></td>
                   <td style="background: #F0F8FF;"><input class="button_input" type="button" value="+" onclick="plus();"></td>
                 </tr>
                 <tr>
                   <td valign="top" style="background: #F0F8FF;"><input class="button_input" type="button" value="-" onclick="sub();"></td>
                 </tr>
               </table>

               <?php
                if($isMember==1){
                  echo "<div style='text-align:center;font-size:25px'>회원 여부<input type='checkbox' name='member' onClick='check(this)' style='width:20px;height:20px'> <div style='font-size:15px'>(10%할인)</div></div>";
                }
                ?>
              </li>

              <!-- 구매과정 -->
              <script type="text/javascript">
                function login_check(){
                  alert("로그인 후 이용해 주세요.");
                }
              </script>
              <?php
              if(!$username){
              echo "<li style='border-bottom:0px'><input class='buy_item_button' type='button' value='구매하기' onClick='login_check()'></li>";

              } else{
              echo "<li style='border-bottom:0px'><input class='buy_item_button' type='submit' value='구매하기'></li>";

            }?>
           </form>
           </li>
         </ul>
       </div>
     </main>
     <?php
       // footer부분
       include_once 'lib/footer_part.html';
     ?>
 </body>
</html>
