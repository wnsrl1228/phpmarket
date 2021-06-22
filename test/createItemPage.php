<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/createItemPage.css">
    <title>물건 파는 사이트</title>
  </head>
  <body style="margin:0">
    <script type="text/javascript">
    //체크박스 구현
    function check(box){
      if(box.checked==true) {
        document.sellForm.sellItemIsMember.value = "true";
      } else{
        document.sellForm.sellItemIsMember.value =  "false";
      }
    }

    </script>
    <!-- 헤더부분 -->
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



      <!--화면 구현-->
      <div class="sell_position">
        <form name="sellForm" action="createItem_process.php" method="post" enctype="multipart/form-data">
         <table cellpadding="40px" >
          <tr>
            <td>이미지 :</td>
            <td><input type="File" name="sellfile" required style="font-size:17px" ></td>
          </tr>
          <tr>
            <td>판매할 물건 이름 :</td>
            <td><input type="text" name="sellItemName"  style="width:300px;height:35px;font-size:20px;" maxlength='100'required></td>
          </tr>
          <tr>
            <td>판매 가격 :</td>
            <td style="font-size:25px;font-weight:bold"><input type="text" name="sellItemPrice"style="width:150px;height:30px;font-size:20px;text-align:right" pattern="[0-9]*" maxlength='50' required >&nbsp원</td>
          </tr>
          <tr>
            <td>회원가 여부 :</td>
            <td><input type="checkbox" name="sellIsMember" value="false" onclick="check(this)" style="width:30px;height:30px"</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;"> <input type="submit" value="등록하기"class="itembutton" style="width:200px;height:60px;font-size:25px;"></td>
          </tr>
         </table>
        </form>
      </div>


      <?php
        // footer부분
        include_once 'lib/footer_part.html';
      ?>
  </body>
</html>
