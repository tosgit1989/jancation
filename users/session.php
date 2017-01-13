<?php
require_once ('../app.php');
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