<?php

include_once './db/db_con.php'; //db연결하기


//전달받은 데이터값을 각각 변수에 담기

$id = $_POST["id"];
$name = $_POST["name"];
$pass = password_hash($_POST['pw'],PASSWORD_DEFAULT);
$pass2 = password_hash($_POST['pw2'],PASSWORD_DEFAULT);
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$regist_day = date('Y-m-d (H:i)'); //현재의 '년-월-일-시-분'을 저장

$sql = "insert members set id ='$id', name='$name', pass='$pass', pass2='$pass2', email='$email', address='$address', phone='$phone', regist_day='$regist_day'"; //숫자가 들어가도 ''쓰는게 좋음


mysqli_query($con,$sql); //sql에 저장된 명령 실행
mysqli_close($con);

?>

<script>
  alert('회원가입 완료')
  location.href = './login.php';
</script>