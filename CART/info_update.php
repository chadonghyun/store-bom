<?php
//회원가입
include_once './db/db_con.php';
include_once './config.php';

//세션정보에 저장된 유저아이디값을 가져와서 쿼리문을 돌리고 결과값을 저장
$sql = "SELECT * FROM members WHERE id = '$useid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result); //배열값을 저장하여 하나씩 출력함
//$row에 no, id, name, gender, pass, email, address, phone, resist_day정보가 담김
?>

<!-- 회원가입 -->

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

  <script>
    //회원가입 입력양식에 대한 유효성감사
    $(function(){

      $('#id').blur(function(){ //아이디 박스를 벗어나면 
        if($(this).val()==''){
          $('#id_check_msg').html('아이디를 입력해주세요.').css('color','#f00').attr('data-check','0');
        }else{
          checkIdAjax();
        }
      });

      //id값을 post로 전송하여 서버와 통신을 통해 중복결과 json형태로 받아오기 위한 함수
      function checkIdAjax(){
        $.ajax({
          url:'./ajax/check_id.php',
          type:'post',
          dataType:'json',
          data:{
            'id':$('#id').val()
          },
          success:function(data){
            if(data.check){
              $('#id_check_msg').html('사용가능한 아이디 입니다.').css('color','#00f').attr('data-check','1');
            }else{
              $('#id_check_msg').html('중복된 아이디 입니다.').css('color','#f00').attr('data-check','0');
            }
          }
        })
      }

      $('#save_frm').click(function(e){
        check_input(); //유효성 감사를 실시한다.
        e.preventDefault()
      });

      function check_input(){
        if(!$('#id').val()){ //아이디값을 입력하지 않은 경우
          alert('아이디를 입력하지 않았습니다.');
          $('#id').focus(); //초점을 아이디 입력박스에 만든다. 
          return false
        }
        if($('#id_check_msg').attr('data-check')=='0'){
          alert('아이디가 존재합니다. 다시 입력하세요.')
          $('#id').focus();
          return false
        }


        if(!$('#pw').val()){
          alert('비밀번호를 입력하지 않았습니다.');
          $('#pw').focus();
          return false
        }
        if(!$('#pw2').val()){
          alert('비밀번호를 입력하지 않았습니다.');
          $('#pw2').focus();
          return false
        }
        if(!$('#name').val()){
          alert('이름을 입력하지 않았습니다.');
          $('#name').focus();
          return false
        }
        if(!$('#email').val()){
          alert('이메일을 입력하지 않았습니다.');
          $('#email').focus();
          return false
        }
        if($('#pw').val()!=$('#pw2').val()){
          alert('비밀번호가 일치하지 않습니다. \n다시 입력하여주세요.')
          $('#pass').focus();
          return false
        }

        //위 입력양식 검사를 통하면 아래 폼 내용 전송
        $('#member_form').submit();

      }

    });  

  </script>



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

  <!-- 메인 콘텐츠 영역 -->
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
        <!-- 오른쪽 상품 목록 출력 -->
        <div class="col-sm-4 col-sm-offset-1 padding-right">
          <div class="login-form">
            <form name="회원정보 수정" method="post" action="member_update.php" id="member_form">
              <h2>회원정보 수정</h2>
              <div class="form-group">
                <label class="col1" for="id">아이디</label>  
                <input type="text" name="id" id="id" style="width:150px;" readonly value="<?=$row['id']?>">  
              </div>

              <div class="form-group">
                <label for="pw" class="col1">비밀번호</label>
                <div class="col2">
                  <input type="password" name="pw" id="pw">
                </div>
              </div>

              <div class="form-group">
                <label for="pw2" class="col1">비밀번호 확인</label>
                <div class="col2">
                  <input type="password" name="pw2" id="pw2">
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col1">이름</label>
                <div class="col2">
                  <input type="text" name="name" id="name" class="form-control" maxlength="20" value="<?=$row['name']?>">
                </div>
              </div>    
              
              <div class="form-group">
                <label for="email" class="col1">이메일</label>
                  <input type="text" name="email" id="email" class="form_control" maxlength="80" value="<?=$row['email']?>">
              </div>

              <div class="col1" style="display: inline-block;">
                <label for="address">주소</label>
                <input type="text" name="address" id="address" class="form_control" value="<?=$row['address']?>">
              </div>

              <div>
                <label for="tel">전화번호</label>
                <input type="text" name="phone" id="tel" class="form_control" value="<?=$row['phone']?>">
              </div>

              <div><span class="btn btn-primary form-control" style="display:inline" id="save_frm" onclick="check_input()">정보수정완료</span></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>