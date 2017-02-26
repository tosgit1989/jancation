<?php
require_once ('../app.php');
$message1 = array_pop(explode('/', $_SERVER['REQUEST_URI']));
if ($message1 == 'failedToSignIn') {
    $message2 = 'サインインに失敗しました';
    $message3 = 'メールアドレスまたはパスワードが正しくありません';
} elseif ($message1 == 'doSignOut') {
    $message2 = 'サインアウトしました';
    $message3 = '';
} elseif ($message1 == 'sessionTimeOut') {
    $message2 = 'セッションがタイムアウトです';
    $message3 = 'もう一度サインインしてください';
}
?>

<div class="page-title">
    <p class="page-title-text"><?php echo $message2 ?></p>
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