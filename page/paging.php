<?php
include $_SERVER['DOCUMENT_ROOT'] . "/header/db_header.php";

if (isset($_POST['page'])) {
    $cur_page = $_POST['page'];
}
//                    if(isset($_GET['page'])) {
//                        $cur_page=$_GET['page'];
//                    }
else {
    $cur_page = 1;
}

$page_sql = mq("select * from board");

$total_list = mysqli_num_rows($page_sql);
$page_size = 5;
$block_size = 5;

$total_page = ceil($total_list / $page_size);
$total_block = ceil($total_page / $block_size);

$cur_block = ceil($cur_page / $block_size);

$page_start = ceil(($cur_block - 1) * $block_size) + 1;
$page_end = $page_start + $block_size - 1;

if ($page_end > $total_page)
    $page_end = $total_page;

$start_num = ($cur_page - 1) * $page_size;