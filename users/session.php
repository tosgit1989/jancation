<?php
session_start();

require_once ('../var.php');
$signType = array_pop(explode('/', $_SERVER['REQUEST_URI']));

// サインアップ時のみ実行
if ($signType == 'signUp') {
    $users = $dataConnect->getAll('users');
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
        } else {
            header('Location: /users/message.php/failedToSignUp2');
        }
    } else {
        header('Location: /users/message.php/failedToSignUp1');
    }
}

// サインイン時とサインアップ時に実行
if ($signType == 'signIn' or $signType == 'signUp') {
    if (isset($_POST['email']) and isset($_POST['psw'])) {
        $users = $dataConnect->getAll('users');
        $p = 0;
        foreach ($users as $user) {
            if ($_POST['email'] == $user['email'] and $_POST['psw'] == $user['psw']) {
                $p += 1;
            }
        }
        if($p == 1) {
            if(isset($_POST['email'])) setcookie("email", $_POST['email'], time()+120);
            $getUserByEmail = $dataConnect->getUserByEmail($_POST['email']);
            $_SESSION['id'] = $getUserByEmail['id'];
            if ($signType == 'signUp') {
                // ※サインアップ時のみ、playscoresテーブルへのinsertも行う
                $playscoreNew['user_id'] = $getUserByEmail['id'];
                $playscoreNew['win_count'] = 0;
                $playscoreNew['lose_count'] = 0;
                $playscoreNew['nickname'] = $_POST['nickname'];
                $playscoreNew['created_at'] = $now = date('Y/m/d H:i:s');
                $playscoreNew['updated_at'] = $now = date('Y/m/d H:i:s');
                $dataConnect->insert($playscoreNew, 'playscores');
            }
            header('Location: /index.php');
        } else {
            $_SESSION['id'] = null;
            header('Location: /users/message.php/failedToSignIn');
        }
    }
}

// サインアウト時のみ実行
if ($signType == 'signOut') {
    unset($_SESSION['id']);
    header('Location: /users/message.php/doSignOut');
}

?>