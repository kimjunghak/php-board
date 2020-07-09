<?php
if(isset($_POST['page'])){
    $cur_page=$_POST['page'];
}
//                    if(isset($_GET['page'])) {
//                        $cur_page=$_GET['page'];
//                    }
else {
    $cur_page=1;
}
?>

<html>
<div id="page_num">
    <ul>
        <?php
        if($cur_page <= 1)
            echo "<li class='fo_re'>처음</li>";
        else {
            echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"1\" class=\"btn-link\">처음</button></li>
                              </form>";
        }
        if($cur_page >= 1){
            if($cur_page - $block_size < 1){
                echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"1\" class=\"btn-link\">이전</button></li>
                              </form>";
            }
            else {
                $pre = $cur_page - $block_size;
                echo "<form action=\"/\" method=\"post\">
                                <li><button type=\"submit\" name=\"page\" value=\"$pre\" class=\"btn-link\">이전</button></li>
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
</html>