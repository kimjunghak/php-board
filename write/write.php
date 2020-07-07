<?php
include $_SERVER['DOCUMENT_ROOT']."/header/header.php";
?>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
            <div id="write_area">
                <form action="write_ok.php" method="post">
                    <div id="in_title">
                        제목 <textarea name="title" id="utitle" rows="1" cols="55" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        글쓴이 <?php
                        if(isset($_SESSION['name'])) {
                            ?> <div id="logined_writer"><?php echo $_SESSION['name']; ?></div>
                        <?php } else { ?>
                            <textarea name="name" id="uname" rows="1" cols="55" required></textarea>
                        <?php } ?>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw" placeholder="비밀번호"/>
                    </div>
                    <div id="in_lock">
                        <input type="checkbox" value="1" name="lock_post"/> 비밀글
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                        <a href="/"><input id="write_cancel" type="button" value="취소"></a>
                    </div>
                </form>
            </div>
    </div>
</body>