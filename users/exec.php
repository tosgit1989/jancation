<?php
require_once ('../app.php');

$userUpd['nickname'] = $_POST['nickname'];
$userUpd['email'] = $_POST['email'];
$userUpd['updated_at'] = $now = date('Y/m/d H:i:s');
$dataConnect->update($userUpd, ['id' => $userId], 'users');
?>

<div class="page-title">
    <p class="page-title-text">
        ユーザー情報を更新しました。
    </p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <a href="/users/show.php/<?php echo $userId ?>" class="btn btn-primary" role="button">マイページへ</a>

            </div>
        </div>
    </div>
</div>