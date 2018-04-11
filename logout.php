<?php
/*
 * 網路假期 - 答案共享資料庫
 * https://netholiday.reh.tw/
 *
 * Developed by 張文相 (Zhang Wenxiang)
 * https://www.facebook.com/GoneToneDY
 */
session_start();
@session_destroy();
if ($_GET['url'] != Null) {
    header('location: '.$_GET['url']);
} else {
    header('location: /');
}
?>
