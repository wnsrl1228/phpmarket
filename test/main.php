
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>물건 파는 사이트</title>
    <!--항목 화면에 출력-->
       <?php
       //출력 함수
       function printItem($item){
         $con = mysqli_connect("localhost","root","autoset","web_db");
         if(mysqli_connect_errno()){
           echo "MySQL연결 실패".mysqli_connect_errno();
         }
         echo "<div class='container'>";
         $result = mysqli_query($con,"SELECT * FROM item_info where item_name LIKE '%$item%';"); //모든 데이터 ""을 포함하&
         while($row = mysqli_fetch_array($result)){
           if($row['is_member']==1){
             $is_member = "회원 할인 가능";
           }else{
              $is_member = "";
           }
           echo "<a href=purchase.php?itemImage={$row['item_image']}&itemName={$row['item_name']}&itemPrice={$row['item_price']}&itemRecommendCount={$row['item_recommend_count']}&isMember={$row['is_member']}&itemId={$row['item_id']}>
                  <dl>
                   <dt><img src='".$row['item_image']."' width='200'height='230' style='object-fit:contain;margin-left:10%;' ></dt>
                   <dd>
                     <div class='item_name'>".$row['item_name']."</div>
                     <div class='item_price'>".$row['item_price']."원</div>
                     <div class='item_recommend_count'>".$row['item_recommend_count']."<img class='testimg' src='https://littledeep.com/wp-content/uploads/2020/09/like-icon-style.png' width=30px height=30px valign='bottom'></div>
                     <div class='is_member'>".$is_member."</div>
                   </dd>
                  </dl>
                 </a>";
         }
         echo "
             </div>";
       }
       ?>
  </head>

  <body style="margin:0;">
      <?php
        // 로그인부분
        include_once 'lib/header_part.php';
      ?>


      <hr>
      <script type="text/javascript">
        function plzLogin(){
          alert("로그인 후 이용해 주세요");

        }
      </script>
     <!-- 내 물건 팔기 버튼 -->
     <div class='sellbutton_position'>
       <form  action="createItemPage.php" style="margin-top:30px" >
         <?php
         if(!$username){
           echo "<input type='button' value='내 물건 팔기' class='sellbutton' onclick='plzLogin()'>";
          }else{
           echo "<input type='submit' value='내 물건 팔기' class='sellbutton'>";
         }
         ?>

       </form>
     </div>
     <main style="margin-top:80px;border-top:1px solid lightgray">
       <!--카테고리-->
       <nav>
         <form class="" action="main.php" method="get" align="center" style="font-size:30px;color:gray;margin-top:20px">
           카테고리 <select class="" name="category" style="width:100px;height:30px;font-size:15px;font-weight:100">
             <option value="all">전체보기</option>
             <option value="notebook">노트</option>
             <option value="monitor">모니터</option>
           </select>
           <input type="submit" name="" value="보기" >
         </form>
       </nav>
       <aside>

       </aside>
       <section>
         <?php
          //분류
          if(isset($_GET['search_contents'])){
            $search_contents = htmlspecialchars($_GET['search_contents']);
            printItem($search_contents);
            }elseif(isset($_GET['category'])){
            $categoty = htmlspecialchars($_GET['category']);
            if($categoty=="notebook"){
                  printItem("노트북");
            }elseif($categoty=="monitor"){
                  printItem("모니터");
            }else{
                printItem("");
            }
          }else{
              printItem("");
          }
           ?>
         </section>
       </main>
       <div class="clear"></div>
       <br><br>
       <?php
         // footer부분
         include_once 'lib/footer_part.html';
       ?>
  </body>
</html>
