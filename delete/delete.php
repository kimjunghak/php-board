<?php
    include $_SERVER['DOCUMENT_ROOT']."/db/db.php";

    if(isset($_SESSION['name'])){
        $uname = $_SESSION['name'];
        $select_sql = mq("select * from board where name='$uname'");
        $board = $select_sql->fetch_array();

        $bno = $board['idx'];

        //$update_sql = mq("update board set name='', pw='', title='', content='', lock_post=0 where idx='$bno'");
        $delete_sql = mq("delete * from board where idx='$bno'");
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
              </form>";
    }

?>

