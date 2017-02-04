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
                        <label for="email"><strong>メールアドレス</strong></label>
                        <input required="required" class="form-control" placeholder="メールアドレスを入力" name="email" id="email" type="text" value="<?php echo $user['email'] ?>"><br>
                        <label for="nickname"><strong>ニックネーム</strong></label>
                        <input required="required" class="form-control" placeholder="ニックネームを入力" name="nickname" id="nickname" type="text" value="<?php echo $user['nickname'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">更新する</button>
                </form>

            </div>
        </div>
    </div>
</div>