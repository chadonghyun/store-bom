<?php

!empty($_POST['id'])?$id=$_POST['id']:$id='';

$ret['check']=false;

if($id!=''){ //값이 있다면 아래 내용 실행
  // $con  = mysqli_connect('localhost','root','','shoppingmall');
  $con  = mysqli_connect('localhost','kcdh29','ckzkckzk2457#','kcdh29');
  $sql = "select id from members where id = '{$id}'";
  $result = mysqli_query($con,$sql);
  $num = mysqli_num_rows($result); //행의 개수 만약 id가 있어서 1개가 추출되면 1이 되고 1이면 중복


  if($num==0){ //만약에 num값이 0이면 (아이디가 일치하지 않으면)
    $ret['check']=true; //true값 넘김
  }
}
echo json_encode($ret); //json데이터로 출력하라

?>