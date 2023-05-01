<?php 
  include_once './db/db_con.php'; //db연결하기
  
  $id   = $_POST['id'];
  $pass = password_hash($_POST['pw'], PASSWORD_DEFAULT);
  $pass2 = password_hash($_POST['pw2'], PASSWORD_DEFAULT);
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email  = $_POST['email'];
  $sql = "UPDATE members SET name = '$name', pass = '$pass', pass2 = '$pass2', email = '$email', phone = '$phone' WHERE id='$id'";

  mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
  mysqli_close($con);   //db종료
  
  echo "
    <script>
      alert('회원정보가 수정되었습니다.');
      location.href = 'logout2.php';
    </script>
  ";
?>
