<?php
require_once ('../app.php');
?>
<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">サインアップページ</p>
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
                        <!--パスワード(確認)入力欄-->
                        <p><strong>パスワード(確認)</strong></p>
                        <input class="form-control" type="password" name="pswconfirm" placeholder="パスワード(確認)を入力" value=""><br>
                        <!--ニックネーム入力欄-->
                        <p><strong>ニックネーム</strong></p>
                        <input class="form-control" type="text" name="nickname" placeholder="ニックネームを入力" value=""><br>
                    </div>
                    <div class="form-group">
                        <!--サインアップボタン-->
                        <input type="submit" name="sign-up" class="btn btn-primary" value="サインアップ">
                        <input type="hidden" name="SignInOrUpOrOut" value="SignUp">
                    </div>
                </form>

                <hr>

                <a href="/users/sign_in.php" class="btn btn-info" value="サインイン">アカウントを持っている方は、こちら</a>

            </div>
        </div>
    </div>
</div>
<div style="height:30px; background-color:transparent"></div>