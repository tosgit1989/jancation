<?php
require_once ('../app.php');
?>

<div class="page-title">
    <p class="page-title-text">サインインページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form action="/auth/session.php/signIn" method="post">
                    <div class="form-group">
                        <!--メールアドレス入力欄-->
                        <label for="email"><strong>メールアドレス</strong></label>
                        <input required="required" class="form-control" type="text" name="email" id="email" placeholder="メールアドレスを入力" value=""><br>
                        <!--パスワード入力欄-->
                        <label for="psw"><strong>パスワード</strong></label>
                        <input required="required" class="form-control" type="password" name="psw" id="psw" placeholder="パスワードを入力" value=""><br>
                    </div>
                    <div class="form-group">
                        <!--サインインボタン-->
                        <input type="submit" name="sign-in" class="btn btn-primary" value="サインイン">
                    </div>
                </form>

                <hr>

                <a href="/auth/sign_up.php" class="btn btn-info" value="サインイン">アカウントを持っていない方は、こちら</a>

            </div>
        </div>
    </div>
</div>