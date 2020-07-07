<?php include $_SERVER['DOCUMENT_ROOT'] . "/header/header.php"; ?>
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
            <table class="list-table">
                <thead>
                <tr>
                    <th width="60">비밀글</th>
                    <th width="70">글 번호</th>
                    <th width="400">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
                </tr>
                </thead>
                <?php
                    if(isset($_POST['page'])){
                        $page=$_POST['page'];
                    }
//                    if(isset($_GET['page'])) {
//                        $cur_page=$_GET['page'];
//                    }
                    else {
                        $page=1;
                    }
                    $page_sql=mq("select * from board");

                    $total_list=mysqli_num_rows($page_sql);
                    $page_size=10;

                    $total_page=ceil($total_list/$page_size);

                    $cur_page=ceil($page/$page_size);

                    $page_start=ceil(($cur_page-1)*$page_size)+1;
                    $page_end=$page_start + $page_size - 1;

                    if($page_end > $total_page)
                        $page_end = $total_page;
                    $start_num = ($page-1) * $page_size;


                    $order_sql = mq("select * from board order by idx desc limit $start_num, $page_size");
                    while ($board = $order_sql->fetch_array()) {
                        $title = $board['title'];
                        if (strlen($title) > 50) {
                            $title = str_replace($board['title'], mb_substr($board['title'], 0, 50, "utf-8") . "...", $board['title']);
                        }
                ?>

                <tbody>
                <tr>
                    <td width="60"><?php if($board['lock_post']=="1") { ?>
                        √
                        <?php }?>
                    </td>
                    <td width="70"><?php echo $board['idx'];?></td>
                    <td width="400"><?php if($board['lock_post'] == 1 && $title != ''){ ?>
                        <a href="/read/lock_read.php?idx=<?php echo $board['idx'];?>"><?php echo $title;?>
                            <?php } else {?>
                                <a href="/read/read.php?idx=<?php echo $board['idx'];?>"><?php echo $title;?>
                            <?php } ?>
                    <td width="120"><?php echo $board['name'];?></td>
                    <td width="100"><?php echo $board['date'];?></td>
                    <td width="100"><?php echo $board['hit'];?></td>
                 </tr>
                </tbody>
                <?php } ?>
            </table>
        <div id="page_num">
            <ul>
                <?php
                    if($page <= 1)
                        echo "<li class='fo_re'>처음</li>";
                    else {
                        echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"1\" class=\"btn-link\">처음</button></li>
                              </form>";
                    }
                    if($page >= 1){
                        if($page == 1){
                            echo "<li><a href='?page=1'>이전</a></li>";
                        }
                        else {
                            $pre = $page - 1;
                            echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"$pre\" class=\"btn-link\">이전</button></li>
                              </form>";
                        }
                    }
                    for($i=$page_start ; $i<=$page_end ; $i++){
                        if($page==$i)
                            echo "<li class='fo_re'>[$i]</li>";
                        else
                            echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"$i\" class=\"btn-link\">[$i]</button></li>
                                </form>";
                    }
                    if($page <= $total_page){
                        if($page == $total_page){
                            echo "<li><a href='?page=$total_page'>다음</a></li>";
                        }
                        else {
                            $next = $page + 1;
                            echo "<form action=\"/\" method=\"post\">
                                    <li><button type=\"submit\" name=\"page\" value=\"$next\" class=\"btn-link\">다음</button></li>
                                  </form>";
                        }
                    }
                    if($page >= $total_page){
                        echo "<li class='fo_re'>끝</li>";
                    }
                    else{
                        echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"$total_page\" class=\"btn-link\">끝</button></li>
                               </form>";
                    }
                ?>
            </ul>
        </div>
        <div id="write_btn">
            <a href="/write/write.php"><button>글쓰기</button></a>
        </div>
    </div>
</body>