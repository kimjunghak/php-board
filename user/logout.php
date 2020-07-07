<?php
header("Content-Type: text/html; charset=UTF-8");

session_start();

if(isset($_SESSION['name'])){
    session_destroy();
    ?>
<script>alert("로그아웃 되었습니다.");
history.back();</script>
<?php } ?>