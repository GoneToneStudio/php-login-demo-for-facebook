<?php
session_start();
require_once dirname(__FILE__).'/facebook_login/initialization.php'; //引入 Facebook 登入初始設定
?>
<html>
    <head>
        <title>Facebook 登入功能示範</title>
    </head>
    <body>
        <h1>Facebook 登入功能示範</h1>
        <h2>教學文章：<a href="https://blog.reh.tw/archives/366" target="_blank">https://blog.reh.tw/archives/366</a></h2>
        <hr>
        <?php if (isset($accessToken)) : require_once dirname(__FILE__) . '/facebook_login/statuslogin.php'; ?>
        <p>您好 <a href="<?php echo $profile["link"]; ?>" target="_blank"><?php echo $profile["first_name"]; ?></a>！</p>
        <br>
        <p>取得的資料陣列<br><?php print_r($profile); ?></p>
        <br>
        <p>全名：<font color="#883584"><?php echo $profile["name"]; ?></font>
            <br>名子：<font color="#883584"><?php echo $profile["first_name"]; ?></font>
            <br>姓氏：<font color="#883584"><?php echo $profile["last_name"]; ?></font>
            <br>Email：<font color="#883584"><?php echo $profile["email"]; ?></font>
            <br>Facebook 個人動態網址：<a href="<?php echo $profile["link"]; ?>" target="_blank"><?php echo $profile["link"]; ?></a>
            <br>大頭照圖片高度：<font color="#883584"><?php echo $profile["picture"]["height"]; ?></font>
            <br>大頭照圖片寬度：<font color="#883584"><?php echo $profile["picture"]["width"]; ?></font>
            <br>大頭照網址：<font color="#883584"><?php echo $profile["picture"]["url"]; ?></font>
            <br><img src="<?php echo $profile["picture"]["url"]; ?>">
            <br>使用者 Facebook ID：<font color="#883584"><?php echo $profile["id"]; ?></font></p>
        <br>
        <h3><a href="logout.php?url=https://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">登出</a></h3>
        <?php else : ?>
        <?php
        $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //取得目前頁面網址
        $loginUrl = $helper->getLoginUrl($url, $permissions); //取得 Facebook 登入網址
        ?>
        <p><font color="#ff0000">您尚未登入 Facebook！</font></p>
        <h3><a href="<?php echo $loginUrl; ?>">使用 Facebook 登入</a></h3>
        <?php endif; ?>
    </body>
</html>
