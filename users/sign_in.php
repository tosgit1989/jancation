<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">サインインページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

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
                        <input type="hidden" name="SignInOrSignUp" value="SignIn">
                        <input type="submit" name="sign-in" class="btn btn-primary" value="サインイン">
                    </div>
                </form>

                <hr>

                <a href="/users/sign_up.php" class="btn btn-info" value="サインイン">アカウントを持っていない方は、こちら</a>

            </div>
        </div>
    </div>
</div>