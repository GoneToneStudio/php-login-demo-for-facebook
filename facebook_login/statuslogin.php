<?php
/*
 * 張文相 Zhang Wenxiang - 個人 Blog
 * https://blog.reh.tw/
 */
if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
} else {
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    $oAuth2Client = $fb->getOAuth2Client();
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
    $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
}

if (isset($_GET['code'])) {
    header('Location: ./');
}

try {
    $profile_request = $fb->get('/me?fields=name,first_name,last_name,email,link,picture');
    $profile = $profile_request->getGraphNode()->asArray();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    header("Location: ./");
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
?>
