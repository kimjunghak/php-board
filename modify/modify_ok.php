<?php
    include $_SERVER['DOCUMENT_ROOT']."/db/db.php";

    header("Pragma: no-cache");
    header("Cache-Control: no-cache, must-revalidate");

    $bno = $_GET['idx'];
    $username = $_POST['name'];
    $userpw = $_POST['pw'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(isset($_POST['lock_post'])){
        $lock = 1;
    }
    else{
        $lock = 0;
    }

    $sql = mq("update board set name='$username', pw='$userpw', title='$title', content='$content', lock_post='$lock' where idx='$bno'");

?>
<?php
if($lock == 1 && $userpw == ''){ ?>
<script type="text/javascript">alert("비밀번호 입력 필요");</script>
<script>history.back();</script>
<?php }  else if($lock == 1 && $userpw != ''){ ?>
    <script type="text/javascript">alert("수정 완료, 비밀글 적용");</script>
    <script>location.replace("/");</script>
<?php } else if($lock == 0 && $userpw != ''){?>
    <script type="text/javascript">alert("비밀글 체크 필요");</script>
    <script>history.back();</script>
    <?php } else { ?>
    <script type="text/javascript">alert("수정 완료");</script>
    <script>location.replace("/read/read.php?idx=<?php echo $bno?>");</script>
<?php }?>
