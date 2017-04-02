<?php
session_start();

require_once ('../var.php');
$signType = array_pop(explode('/', $_SERVER['REQUEST_URI']));
$users = $dataConnect->getAll('users');

// ①サインアップ時
if ($signType == 'signUp') {
    if (isset($_POST['email']) and isset($_POST['psw']) and isset($_POST['pswconfirm']) and isset($_POST['nickname'])) {
        $p = 0;
        foreach ($users as $user) {
            if ($_POST['email'] == $user['email'] or $_POST['psw'] == $user['psw'] or $_POST['nickname'] == $user['nickname']) {
                $p += 1;
            }
        }
        if ($_POST['psw'] == $_POST['pswconfirm']) {
            if ($p == 0) {
                // usersテーブルへのinsertを実行
                $userNew['email'] = $_POST['email'];
                $userNew['psw'] = $_POST['psw'];
                $userNew['nickname'] = $_POST['nickname'];
                $userNew['created_at'] = $now = date('Y/m/d H:i:s');
                $userNew['updated_at'] = $now = date('Y/m/d H:i:s');
                $dataConnect->insert($userNew, 'users');
                // $userIdentifiedByEmail
                $userIdentifiedByEmail = $dataConnect->getUserByEmail($_POST['email']);
                // playscoresテーブルへのinsertを実行
                $playscoreNew['user_id'] = $userIdentifiedByEmail['id'];
                $playscoreNew['win_count'] = 0;
                $playscoreNew['lose_count'] = 0;
                $playscoreNew['nickname'] = $_POST['nickname'];
                $playscoreNew['created_at'] = $now = date('Y/m/d H:i:s');
                $playscoreNew['updated_at'] = $now = date('Y/m/d H:i:s');
                $dataConnect->insert($playscoreNew, 'playscores');
                // クッキーの設定
                setcookie("email", $_POST['email'], time()+120);
                // $_SESSION['id']の設定
                $_SESSION['id'] = $userIdentifiedByEmail['id'];
                // トップページへ移動
                header('Location: /index.php');
            } else {
                unset($_SESSION['id']);
                header('Location: /users/message.php/failedToSignUpUsed');
            }
        } else {
            unset($_SESSION['id']);
            header('Location: /users/message.php/failedToSignUpMismatch');
        }
    } else {
        unset($_SESSION['id']);
        header('Location: /users/message.php/failedToSignUpEmpty');
    }
}

// ②サインイン時
if ($signType == 'signIn') {
    if (isset($_POST['email']) and isset($_POST['psw'])) {
        $q = 0;
        foreach ($users as $user) {
            if ($_POST['email'] == $user['email'] and $_POST['psw'] == $user['psw']) {
                $q += 1;
            }
        }
        if($q == 1) {
            // $userIdentifiedByEmail
            $userIdentifiedByEmail = $dataConnect->getUserByEmail($_POST['email']);
            // クッキーの設定
            setcookie("email", $_POST['email'], time()+120);
            // $_SESSION['id']の設定
            $_SESSION['id'] = $userIdentifiedByEmail['id'];
            // トップページへ移動
            header('Location: /index.php');
        } else {
            unset($_SESSION['id']);
            header('Location: /users/message.php/failedToSignInWrong');
        }
    } else {
        unset($_SESSION['id']);
        header('Location: /users/message.php/failedToSignInEmpty');
    }
}

// ③サインアウト時
if ($signType == 'signOut') {
    unset($_SESSION['id']);
    header('Location: /users/message.php/doSignOut');
}

?>