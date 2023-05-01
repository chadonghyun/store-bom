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
  <title>베스트 상품</title>

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
                <li><a href="best.php" title="베스트상품">베스트상품</a></li>
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

        <?php
          // $sql = "select * from shop_data";
          // $result = mysqli_query($con, $sql);
          $sql = "SELECT * FROM shop_data where cate = 'a01'";
          $result1 = mysqli_query($con,$sql);

          $sql = "SELECT * FROM shop_data where cate = 'a02'";
          $result2 = mysqli_query($con, $sql);
        ?>

        <!-- 오른쪽 상품 목록 출력 -->
        <div class="col-sm-9 padding-right">
          <div class="features_items">
            <h2 class="title text-center">Best Product</h2>      
            <?php while ($row = mysqli_fetch_array($result2)){?>
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="<?=$row['img']?>" alt="" style="width: 200px; height:200px;">
                      <h2></h2>
                      <p><?=$row['name']?></p>
                      <p><?=$row['comment']?></p>
                      <a href="./product-details.php?no=<?=$row['no']?>" class="btn btn-default add-to-cart">
                        <i class="fa fa-shopping-cart"></i>
                        상품상세보기
                      </a>
                    </div>
                    <div class="product-overlay text-center">
                      <div class="overlay-content">
                        <h2><?=number_format($row['price'])?></h2>
                        <h2><?=$row['comment']?></h2>
                        <a href="./product-details.php?no=<?=$row['no']?>" class="btn btn-default add-to-cart">
                        <i class="fa fa-shopping-cart"></i>
                        상품상세보기
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php };?>
          </div>

        </div>
      </div>
    </div>
  </section>

  <footer>
    <div>
      <address>
        Copyrigh@copy;2023 000000 allright reserved.
      </address>
    </div>
  </footer>

</body>
</html>