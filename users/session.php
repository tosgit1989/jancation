<?php
require_once ('../app.php');
if ($_POST['SignInOrSignUp'] == 'SignUp') {
    $users = $dataConnect->getAll('users');
    $p = 0;
    foreach ($users as $user) {
        if ($_POST['email'] == $user['email'] or $_POST['psw'] == $user['psw'] or $_POST['nickname'] == $user['nickname']) {
            $p += 1;
        }
    }
    if ($_POST['psw'] == $_POST['pswconfirm'] and $p == 0) {
        $userNew['email'] = $_POST['email'];
        $userNew['psw'] = $_POST['psw'];
        $userNew['nickname'] = $_POST['nickname'];
        $userNew['win_count'] = 0;
        $userNew['lose_count'] = 0;
        $userNew['created_at'] = $now = date('Y/m/d H:i:s');
        $userNew['updated_at'] = $now = date('Y/m/d H:i:s');
        $dataConnect->insert($userNew, 'users');
    } else {
        header('Location: /users/sign_up.php');
    }
}

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
        header('Location: /index.php');
    } else {
        $_SESSION['id'] = null;
        header('Location: /users/sign_in.php');
    }
}
?>