<?php
include $_SERVER['DOCUMENT_ROOT']."/db/db.php";

$uid = $_GET['id'];
$upw = $_GET['pw'];
$uname = $_GET['name'];

$sql = mq("select * from user where id='$uid'");


if(mysqli_num_rows($sql) < 1){
    mq("insert into user(id, pw, name) values ('$uid', '$upw', '$uname');");
    echo "<script>
        alert('회원가입 완료');
        location.replace('/'); </script>";
}

else{
    echo "<script>
        alert('이미 사용중인 ID입니다.');
        history.back(); </script>";
}

