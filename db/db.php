<?php

    session_start();
    header('Content-Type: text/html; charset=utf-8');

    $db = new mysqli("localhost", "webboard", "1234", "boarddb", "3306");
    $db->set_charset("utf-8");

    function mq($sql){
        global $db;
        return $db->query($sql);
    }
