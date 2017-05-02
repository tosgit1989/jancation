<?php

if (preg_match('"users/message.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/sign_in.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/sign_up.php"', $_SERVER['REQUEST_URI'])) {
    // 上記4通りの場合は、セッションが効いていなくても何もしない
} elseif ($_SESSION['id'] < 1) {
    // 上記の場合以外で、セッションが効いていない場合
    header('Location: /users/message.php/sessionTimeOut');
} else {
    //セッションが効いている場合
    $userId = $_SESSION['id'];
    $user = $dataConnect->getById($userId, 'users');
    $userScore = $dataConnect->getScoreByUserId($userId);
}

?>