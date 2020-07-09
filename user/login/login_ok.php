<?php
include $_SERVER['DOCUMENT_ROOT']."/header/db_header.php";
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");

$uid = $_GET['id'];
$upw = $_GET['pw'];
$sql = mq("select * from user where id='$uid'");

if(mysqli_num_rows($sql) === 1){
    $user = $sql->fetch_array();

    $dpw = $user['pw'];

    if($upw === $dpw){
        $_SESSION['name'] = $user['name'];
        echo "<script>
            alert('로그인에 성공하였습니다.');
            location.href='/';
            </script>";

    }
    else{
        echo "<script>
            alert('아이디 혹은 비밀번호를 확인하세요.');
            history.back();
            </script>";
    }
}
else{
    echo "<script>
            alert('아이디 혹은 비밀번호를 확인하세요.');
            history.back();
            </script>";
}