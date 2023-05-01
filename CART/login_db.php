<?php
include_once './db/db_con.php';

// login.php에서 post방식으로 전달받은 id, pw를 변수에 각각 담는다

$id = $_POST['id'] ?? ''; // 배열로 가져오지 않으면 기본값 (값이 없을때)
$pass = $_POST['pw'] ?? '';

// 쿼리문을 사용하여 id체크
$sql = "select * from members where id = '$id'";
$result = mysqli_query($con, $sql);

$num_match = mysqli_num_rows($result);

if(!$num_match){
  echo"
  <script>
  window.alert('등록되지 않은 아이디입니다.');
  history.go(-1)
  </script>
  ";
}else{
  $row = mysqli_fetch_assoc($result);
  $db_pass = $row['pass']; //db에서 넘어온 패스워드를 저장 (컬럼명)

  mysqli_close($con);

  if(!password_verify($pass, $db_pass)){ //패스워드가 일치하지 않는다면
    echo("
    <script>
    window.alert('비밀번호가 다릅니다.');
    history.go(-1)
    </script>
    ");
    exit;
  }else{ //패스워드가 맞다면 세션값을 저장하고 index.php로 이동한다
    session_start();
    $_SESSION['useid'] = $row['id'];
    $_SESSION['username'] = $row['name'];
    echo("
    <script>location.href='index.php';</script>
    ");
  }

}
?>
