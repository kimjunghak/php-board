<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/header/db_header.php";

    $bno = $_GET['idx'];
    $sql = mq("select * from board where idx='$bno';");
    $board = $sql->fetch_array();
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" href="/css/style.css"/>
</head>

<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <div id="write_area">
            <form action="modify_ok.php?idx=<?php echo $bno; ?>" method="post">
                <div id="in_title">
                    제목 <textarea name="title" id="utitle" rows="1" cols="55" required><?php echo $board['title'];?></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_name">
                    글쓴이 <textarea name="name" id="uname" rows="1" cols="55" required><?php echo $board['name'];?></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_content">
                    <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content'];?></textarea>
                </div>
                <div id="in_pw">
                    <input type="password" name="pw" id="upw" placeholder="비밀번호"/>
                </div>
                <div id="in_lock">
                        <input type="checkbox" name="lock_post" value="<?php $board['lock_post'];?>" <?php
                        if($board['lock_post'] == 1){
                            echo "checked";
                        }?>/> 비밀글
                </div>
                <div class="bt_se">
                    <button type="submit">글 수정</button>
                    <a href="/read/read.php?idx=<?php echo $board['idx'];?>"><input type="button" value="취소"></a>
                </div>
            </form>
        </div>
    </div>
</body>

