<!-- config.php 세션정보를 유지하기 위한 문서 -->
<!-- isset 함수 : 변수가 설정되었느지 확인해주는 함수입니다. 
보통 변수 값에 NULL 체크는 하지만, 설정 여부를 확인 안해서 발생하는 경우가 존재할 때 사용하는 함수입니다. -->

<?php

//세션
session_start();
if(isset($_SESSION['useid'])) $useid = $_SESSION['useid'];
  else $useid = '';

if(isset($_SESSION['username'])) $username = $_SESSION['username'];
  else $username = '';


?>