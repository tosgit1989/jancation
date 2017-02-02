<?php
require_once ('../app.php');
?>

<div class="page-title">
    <p class="page-title-text">ユーザー情報の編集</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form method="POST" action="/users/exec.php/<?php echo $UserId ?>">
                    <div class="form-group">
                        <p><strong>メールアドレス</strong></p>
                        <input required="required" class="form-control" placeholder="メールアドレスを入力" name="email" type="text" value="<?php echo $user['email'] ?>"><br>
                        <p><strong>ニックネーム</strong></p>
                        <input required="required" class="form-control" placeholder="ニックネームを入力" name="nickname" type="text" value="<?php echo $user['nickname'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">更新する</button>
                </form>

            </div>
        </div>
    </div>
</div>