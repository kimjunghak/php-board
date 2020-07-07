<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/db/db.php";
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
</head>
<body>
<?php
    $bno = $_GET['idx'];
    $hit = mysqli_fetch_array(mq("select * from board where idx = '$bno'"));
    $hit = $hit['hit'] + 1;
    $fet = mq("update board set hit = '$hit' where idx = '$bno'");
    $sql = mq("select * from board where idx = '$bno'");
    $board = $sql->fetch_array();
?>

<div id="board_read">
    <h2><?php
        echo $board['title'];
        ?></h2>
        <div id="user_info">
            글쓴이: <?php
                echo $board['name'];
            ?> / 작성일:
            <?php
                echo $board['date'];
            ?> / 조회수:
            <?php
                echo $board['hit'];
            ?>
            <div id="bo_line"></div>
        </div>
        <div id="bo_content">
            <?php
                echo nl2br("$board[content]");
            ?>
        </div>
    <div id="bo_ser">
        <ul>
            <li><a href="/"><button>목록</button></a></li>
            <li><a href="/modify/modify.php?idx=<?php echo $board['idx']; ?>"><button>수정</button></a></li>
            <li><a href="/delete/delete.php?idx=<?php echo $board['idx']; ?>"><button>삭제</button></a></li>
        </ul>
    </div>
</div>
</body>





