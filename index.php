<?php include $_SERVER['DOCUMENT_ROOT'] . "/header/html_header.php";
?>
<div id="board_area">
    <h1><a href="/">자유게시판</a></h1>
    <div id="user_btn">
        <?php
        if(isset($_SESSION['name'])){
            echo $_SESSION['name'];?> 님 환영합니다.
            <a href="/user/logout.php"><button>로그아웃</button></a>
        <?php } else {  ?>
            <a href="/user/signup/signup.php"><button>회원가입</button></a>
            <a href="/user/login/login.php"><button>로그인</button></a>
        <?php } ?>
    </div>

    <?php require_once 'page/table_ajax.php' ?>

    <div id="write_btn">
        <a href="/write/write.php"><button>글쓰기</button></a>
    </div>
</div>
<script>
    function pagination(obj) {
        var page = $(obj).val();

        $.post('page/table_ajax.php', {"page": page}, function (data) {
            $('.list_n_page').html(data);
        });
    }
</script>
</body>