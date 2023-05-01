<?php

session_start();

//unset = 정보삭제
unset($_SESSION['useid']);
unset($_SESSION['username']);

//echo ==  document.write
echo("

  <script>
    location.href = './index.php';
  </script>

")

?>