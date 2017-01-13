<?php
require_once ('../app.php');
?>

<!--フォーム-->
<form action="/users/session.php" method="post">
    <div class="form-group">
        <!--メールアドレス入力欄-->
        <p><strong>メールアドレス</strong></p>
        <input class="form-control" type="text" name="email" placeholder="メールアドレスを入力" value=""><br>
        <!--パスワード入力欄-->
        <p><strong>パスワード</strong></p>
        <input class="form-control" type="password" name="psw" placeholder="パスワードを入力" value=""><br>
    </div>
    <div class="form-group">
        <!--サインインボタン-->
        <input type="submit" name="sign-in" class="btn btn-primary" value="サインイン">
    </div>
</form>