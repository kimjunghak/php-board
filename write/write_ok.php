<?php

include $_SERVER['DOCUMENT_ROOT'] . "/db/db.php";


if(isset($_SESSION['name'])){
    $username = $_SESSION['name'];
}
else{
    $username = $_POST['name'];
}

$userpw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

if(isset($_POST['lock_post'])){
    $lock = 1;
}
else{
    $lock = 0;
}

if($lock == 1 && $userpw == ''){
    echo "<script type=\"text/javascript\">alert('비밀번호 입력 필요');</script>";
    echo "<script>history.back();</script>";
}
else if($lock == 1 && $userpw != ''){
    $sql = mq("insert into board(name, pw, title, content, date, lock_post) values ('$username', '$userpw', '$title', '$content', '$date', '$lock')");
    echo "<script>alert('글쓰기 완료, 비밀글 적용');</script>";
    echo "<script>location.replace('/');</script>";
}
else if($lock == 0 && $userpw != ''){
    echo "<script>alert('비밀글 체크 필요')</script>";
    echo "<script>history.back();</script>";
}
else{
    $sql = mq("insert into board(name, pw, title, content, date, lock_post) values ('$username', '$userpw', '$title', '$content', '$date', '$lock')");
    echo "<script>alert('글쓰기 완료');</script>";
    echo "<script>location.replace('/')</script>";
}
?>
