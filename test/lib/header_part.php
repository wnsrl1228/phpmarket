<?php
  session_start();
  if(isset($_SESSION['username'])){
    $username = $_SESSION["username"];
    $userid =  $_SESSION['userid'];
  }
  else $username="";
 ?>
    <script type="text/javascript">
      function search_click(){
        if(document.headerform.search_contents.value==""){
          return false;
        }
      }
    </script>
    <header>
      <div class="header_detail">
        <form action="main.php" method="get" style="margin:10px 0px 0px 300px" name="headerform">
          <a class="title_a" href="main.php">물건 파는 사이트</a>&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="search_input" type="text" name="search_contents" size=12px style="border-radius:10px; border:1px solid black">
          <input type="image" src="/img/search.png" class="search_button" name="submit"  onclick="return search_click()" >
        </form>
      </div>
    <!-- 로그인부분 -->
    <div class="header_login">
      <div class="header_login_position">
        <?php
        if(!$username){
        echo "<a href='loginForm.php'>로그인│</a>";
        echo "<a href='signUp.php'>회원가입</a>";
        } else{
        echo "<a href='user_info_alter.php'>{$username}│</a>";
        echo "<a href='purchase_list.php'>구매목록│</a>";
        echo "<a href='logout_process.php'>로그아웃</a>";

      }?>
      </div>
    </div>
  </header>
