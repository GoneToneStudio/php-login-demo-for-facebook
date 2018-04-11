<?php
/*
 * 張文相 Zhang Wenxiang - 個人 Blog
 * https://blog.reh.tw/
 */
session_start();
@session_destroy();
if ($_GET['url'] != Null) {
    header('location: '.$_GET['url']);
} else {
    header('location: /');
}
?>
