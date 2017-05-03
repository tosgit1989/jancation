<?php
if (preg_match('"auth/message.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"auth/sign_in.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"auth/sign_up.php"', $_SERVER['REQUEST_URI'])) {
    // 1. 何もしない
} else {
    // 2. セッションが無効ならサインインページへリダイレクト、有効ならユーザーIDによりユーザー情報を取得
    if ($_SESSION['id'] < 1) {
        header('Location: /auth/message.php/sessionTimeOut');
    } else {
        $userId = $_SESSION['id'];
        $user = $dataConnect->getById($userId, 'users');
        $userScore = $dataConnect->getScoreByUserId($userId);
    }
}
?>