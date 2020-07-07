<?php
    include $_SERVER['DOCUMENT_ROOT']."/db/db.php";

$bno = $_GET['idx'];

if(isset($_SESSION['name'])){
    $uname = $_SESSION['name'];
}
else{
    $uname = '';
}

$select_sql = mq("select * from board where idx='$bno'");
$board = $select_sql->fetch_array();

if($uname == $board['name']){

    $delete_sql = mq("delete * from board where name='$uname'");

    echo "<script>alert('삭제 완료');</script>";
    echo "<script>location.replace('/');</script>";
}
else{
    $bno = $_GET['idx'];
    echo "<form action='delete_ok.php' method='post'>
               <label>관리자 암호가 필요합니다.</label><br>
               <input type='hidden' name='idx' value='$bno'>
               <input type=\"password\" name=\"input_pw\" required>
               <button type='submit'>확인</button>
               <a href='/read/read.php?idx=$bno'><input type='button' value='취소'/></a>
               </form>";
}

?>

