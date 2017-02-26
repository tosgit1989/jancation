<?php
require_once ('../app.php');
?>

<div class="page-title">
    <p class="page-title-text">サインアップページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form action="/users/session.php/signUp" method="post">
                    <div class="form-group">
                        <!--メールアドレス入力欄-->
                        <label for="email"><strong>メールアドレス</strong></label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="メールアドレスを入力" value=""><br>
                        <!--パスワード入力欄-->
                        <label for="psw"><strong>パスワード</strong></label>
                        <input class="form-control" type="password" name="psw" id="psw" placeholder="パスワードを入力" value=""><br>
                        <!--パスワード(確認)入力欄-->
                        <label for="pswconfirm"><strong>パスワード(確認)</strong></label>
                        <input class="form-control" type="password" name="pswconfirm" id="pswconfirm" placeholder="パスワード(確認)を入力" value=""><br>
                        <!--ニックネーム入力欄-->
                        <label for="nickname"><strong>ニックネーム</strong></label>
                        <input class="form-control" type="text" name="nickname" id="nickname" placeholder="ニックネームを入力" value=""><br>
                    </div>
                    <div class="form-group">
                        <!--サインアップボタン-->
                        <input type="submit" name="sign-up" class="btn btn-primary" value="サインアップ">
                    </div>
                </form>

                <hr>

                <a href="/users/sign_in.php" class="btn btn-info" value="サインイン">アカウントを持っている方は、こちら</a>

            </div>
        </div>
    </div>
</div>