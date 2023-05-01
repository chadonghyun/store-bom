<?php

include_once './db/db_con.php';
include_once './config.php';

?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STORE BOM</title>

  <link rel="stylesheet" href="./css/animate.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/prettyPhoto.css">
  <link rel="stylesheet" href="./css/price-range.css">
  <link rel="stylesheet" href="./css/responsive.css">

  <script src="./script/jquery.js"></script>
  <script src="./script/contact.js"></script>
  <script src="./script/gmaps.js"></script>
  <script src="./script/jquery-1.10.2.js"></script>
  <script src="./script/jquery-1.10.2.min.js"></script>
  <script src="./script/main.js"></script>
  <script src="./script/price-range.js"></script>
  <script src="./script/bootstrap.min.js" defer></script>



</head> 
<body>
  
  <!-- 상단헤더영역 -->
  <header id="header">
    <div class="header-middle">
      <div class="container">
        <div class="row">
          <div class="col-md-4 clearfix">
            <h1 class="logo pull-left">
              <a href="./index.php" title="메인페이지로 바로가기">
                <img src="./images/logo.png" alt="상단로고">
              </a>
            </h1>
          </div>

          <div class="col-md-8 clearfix">
            <div class="shop-menu clearfix pull-right">
              <ul class="nav navbar-nav">
                <?php
                  if(!$useid){      
                ?>
                <li><a href="order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
                <li><a href="login.php"><i class="fa fa-lock"></i>로그인</a></li>
                <li><a href="sign.php"><i class="fa fa-lock"></i>회원가입</a></li>
                <?php
                  }else{
                    $logged = $username."(".$useid.")님 환영합니다";  
                ?>
                <li><a href=""><i></i><?=$logged ?></a></li>  
                <li><a href="./order_list.php"><i class="fa fa-shopping-cart"></i>주문정보</a></li>
                <li><a href="./cart.php"><i class="fa fa-shopping-cart"></i>장바구니</a></li>
                <li><a href="./logout.php"><i class="fa fa-lock"></i>로그아웃</a></li>
                <li><a href="#"><i class="fa fa-lock"></i>정보수정</a></li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>  

        </div>
      </div>
    </div>

    <!-- 카테고리 영역 -->
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <!-- 모바일 토글 메뉴 -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>      
                <span class="icon-bar"></span>      
                <span class="icon-bar"></span>      
                <span class="icon-bar"></span>      
              </button>
            </div>          

        <!-- 쇼핑몰 가로 메인 내비게이션 -->
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="index.php" title="메인페이지로 바로가기">HOME</a></li>
                <li><a href="new_product.php" title="신상품">신상품</a></li>
                <li><a href="best_product.php" title="베스트상품">베스트상품</a></li>
                <li><a href="md.php" title="MD추천상품">MD추천상품</a></li>
                <li><a href="sale.php" title="10%할인쿠폰">10%할인쿠폰</a></li>
                <li><a href="review.php" title="구매후기">구매후기</a></li>
                <li><a href="productqa.php" title="상품Q&A">상품Q&A</a></li>
              </ul>    
            </div>
          </div>
        </div>  
      </div>
    </div>              

  </header>

  <section>
    <div class="container">
      <div class="row">
        <!-- 왼쪽 카테고리 -->
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordain">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="#cate01" data-toggle="collapse" data-parent="#accordian">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      함께하는 공간
                    </a>
                  </h4>
                </div>
                <div id="cate01" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#" title="미끄럼 방지 매트">미끄럼 방지 매트</a></li>
                      <li><a href="#" title="계단">계단</a></li>
                      <li><a href="#" title="하우스/침대">하우스/침대</a></li>
                      <li><a href="#" title="식기테이블">식기테이블</a></li>
                      <li><a href="#" title="배변패드">배변패드</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="#cate02" data-toggle="collapse" data-parent="#accordian">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      함께하는 공간
                    </a>
                  </h4>
                </div>
                <div id="cate02" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#" title="미끄럼 방지 매트">미끄럼 방지 매트</a></li>
                      <li><a href="#" title="계단">계단</a></li>
                      <li><a href="#" title="하우스/침대">하우스/침대</a></li>
                      <li><a href="#" title="식기테이블">식기테이블</a></li>
                      <li><a href="#" title="배변패드">배변패드</a></li>
                    </ul>
                  </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="#cate03" data-toggle="collapse" data-parent="#accordian">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      함께하는 공간
                    </a>
                  </h4>
                </div>
                <div id="cate03" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#" title="미끄럼 방지 매트">미끄럼 방지 매트</a></li>
                      <li><a href="#" title="계단">계단</a></li>
                      <li><a href="#" title="하우스/침대">하우스/침대</a></li>
                      <li><a href="#" title="식기테이블">식기테이블</a></li>
                      <li><a href="#" title="배변패드">배변패드</a></li>
                    </ul>
                  </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="#cate04" data-toggle="collapse" data-parent="#accordian">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      함께하는 공간
                    </a>
                  </h4>
                </div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 오른쪽 로그인폼           -->
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form">
            <h2>로그인</h2>      
            <form action="login_db.php" method="post" name="로그인">
              <input type="text" placeholder="아이디" name="id" id="id">   
              <input type="password" placeholder="비밀번호" name="pw">
              <span>
                <input type="checkbox" class="checkbox" id="save">
                <label for="save">아이디 저장</label>
              </span>
              <br>
              <button type="submit" class="btn btn-default" style="display: inline;">로그인</button>
            </form>
          </div>        
        </div>


      </div>
    </div>
  </section>

  <script>

$(document).ready(function(){

 //저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
  var key = getCookie("key");
  $("#id").val(key);


  if($("#id").val() !=""){// 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
    $("#save").attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
  }

  $("#save").change(function(){ // 체크박스에 변화가 있다면,
        if($("#save").is(":checked")){ // ID 저장하기 체크했을 때,
            setCookie("key", $("#id").val(), 2); // 하루 동안 쿠키 보관
        }else{ // ID 저장하기 체크 해제 시,
            deleteCookie("key");
        }
  });

    // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
    $("#id").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
        if($("#save").is(":checked")){ // ID 저장하기를 체크한 상태라면,
            setCookie("key", $("#id").val(), 2); // 7일 동안 쿠키 보관
        }
    });
});



  //쿠키 함수 
  function setCookie(cookieName, value, exdays){
      var exdate = new Date();
      exdate.setDate(exdate.getDate() + exdays);
      var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
      document.cookie = cookieName + "=" + cookieValue;
  }

  function deleteCookie(cookieName){
      var expireDate = new Date();
      expireDate.setDate(expireDate.getDate() - 1);
      document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
  }

  function getCookie(cookieName) {
      cookieName = cookieName + '=';
      var cookieData = document.cookie;
      var start = cookieData.indexOf(cookieName);
      var cookieValue = '';
      if(start != -1){
          start += cookieName.length;
          var end = cookieData.indexOf(';', start);
          if(end == -1)end = cookieData.length;
          cookieValue = cookieData.substring(start, end);
      }
      return unescape(cookieValue);
  }

</script>
</body>
</html>