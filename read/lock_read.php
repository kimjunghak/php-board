<?php include $_SERVER['DOCUMENT_ROOT'] . "/header/header.php";
$bno = $_GET['idx'];
$sql = mq("select * from board where idx='$bno';");
$board = $sql->fetch_array();
?>
    <div id="board_write">
        <h1>비밀글 입니다.</h1>
            <form action="" method="post">
                <p>암호 <input type="password" name="pw_check"/>
                        <input type="submit" value="확인"/>
                        <a href="/"><input type="button" value="취소"></a></p>
            </form>
    </div>
    <?php
        $bpw = $board['pw'];

        if(isset($_POST['pw_check'])){
            $pwk = $_POST['pw_check'];
            if($pwk === $bpw){
                ?>
                <script type="text/javascript">location.replace("read.php?idx=<?php echo $board['idx'] ?>"); </script>
            <?php } else { ?>
                <script type="text/javascript">alert("비밀번호 오류");</script>
            <?php }
        }  ?>
</body>