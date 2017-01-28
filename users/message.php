<?php
require_once ('../app.php');
$message1 = array_pop(explode('/', $_SERVER['REQUEST_URI']));
if ($message1 == 'FailedToSignIn') {
    $message2 = 'サインインに失敗しました';
    $message3 = 'メールアドレスまたはパスワードが正しくありません';
} elseif ($message1 == 'DoSignOut') {
    $message2 = 'サインアウトしました';
    $message3 = '';
} elseif ($message1 == 'SessionTimeOut') {
    $message2 = 'セッションがタイムアウトです';
    $message3 = 'もう一度サインインしてください';
}
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white"><?php echo $message2 ?></p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3><?php echo $message3 ?></h3>
                <a href="/users/sign_in.php" class="btn btn-info" value="サインイン">サインインページへ</a>

            </div>
        </div>
    </div>
</div>