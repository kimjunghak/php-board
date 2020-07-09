<?php
include_once 'paging.php';
?>

<html>
<div class="page_num">
    <ul>
        <?php

        if($cur_page <= 1)
            echo "<li class='fo_re'>처음</li>";
        else {
            echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"1\" class=\"btn-link\">처음</button></li>";
        }
        if($cur_page >= 1){
            if($cur_page - $block_size < 1){
                echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"1\" class=\"btn-link\">이전</button></li>";
            }
            else {
                $pre = $cur_page - $block_size;
                echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"$pre\" class=\"btn-link\">이전</button></li>";
            }
        }
        for($i=$page_start ; $i<=$page_end ; $i++){
            if($cur_page==$i)
                echo "<li class='fo_re'>[$i]</li>";
            else
                echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"$i\" class=\"btn-link\">[$i]</button></li>";

        }
        if($cur_page <= $total_page){
            if($cur_page + $block_size > $total_page){
                echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"$total_page\" class=\"btn-link\">다음</button></li>";
            }
            else {
                $next = $cur_page + $block_size;
                echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"$next\" class=\"btn-link\">다음</button></li>";
            }
        }
        if($cur_page >= $total_page){
            echo "<li class='fo_re'>끝</li>";
        }
        else{
            echo "<li><button type=\"button\" onclick='pagination(this)' name=\"page\" value=\"$total_page\" class=\"btn-link\">끝</button></li>";
        }
        ?>
    </ul>
</div>
</html>