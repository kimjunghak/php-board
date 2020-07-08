<?php
include $_SERVER['DOCUMENT_ROOT']."/db/db.php";
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");

$admin_pw = '!@#qweasd!@#';
$bno = $_POST['idx'];

if(isset($_POST['input_pw'])){
    $input_pw = $_POST['input_pw'];
}
else{
    $input_pw ='';
}

if($input_pw == $admin_pw){
    $delete_sql = mq("delete from board where idx='$bno'");
    echo "<script>alert('삭제 완료');</script>";
    echo "<script>location.replace('/');</script>";
}
else{
    echo "<script charset='UTF-8'>alert('권한이 없습니다.')</script>";
    echo "<script>history.back();</script>";
}
