<html>
<div class="list_n_page">
    <table class="list_table">
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
        include 'paging.php';

        $order_sql = mq("select * from board order by idx desc limit $start_num, $page_size");
        while ($board = $order_sql->fetch_array()) {
            $title = $board['title'];
            if (strlen($title) > 50) {
                $title = str_replace($board['title'], mb_substr($board['title'], 0, 50, "utf-8") . "...", $board['title']);
            }
            ?>

            <tbody id="board_list">
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
            if($cur_page <= 1)
                echo "<li class='fo_re'>처음</li>";
            else {
                echo ">처음</button></li>
                              </form>\"";
            }
            if($cur_page >= 1){
                if($cur_page - $block_size < 1){
                    echo ">이전</button></li>
                              </form>\"";
                }
                else {
                    $pre = $cur_page - $block_size;
                    echo ">이전</button></li>
                              </form>";
                }
            }
            for($i=$page_start ; $i<=$page_end ; $i++){
                if($cur_page==$i)
                    echo "<li class='fo_re'>[$i]</li>";
                else
                    echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"$i\" class=\"btn-link\">[$i]</button></li>
                                </form>";
            }
            if($cur_page <= $total_page){
                if($cur_page + $block_size > $total_page){
                    echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"$total_page\" class=\"btn-link\">다음</button></li>
                              </form>";
                }
                else {
                    $next = $cur_page + $block_size;
                    echo "<form action=\"/\" method=\"post\">
                                    <li><button type=\"submit\" name=\"page\" value=\"$next\" class=\"btn-link\">다음</button></li>
                                  </form>";
                }
            }
            if($cur_page >= $total_page){
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
</div>
</html>