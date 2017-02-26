<?php
require_once ('../app.php');

if ($_POST['exectype'] == 'newRequest') {
    // 申請新規作成時
    $ExecMessage = '申請が完了しました。';
    $requestNew['to_user_id'] = $_POST['to_user_id'];
    $requestNew['from_user_id'] = $userId;
    $requestNew['created_at'] = $now = date('Y/m/d H:i:s');
    $requestNew['updated_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insert($requestNew, 'requests');
} elseif ($_POST['exectype'] == 'editRequest') {
    // 申請更新時
    $ExecMessage = '申請を更新しました。';
    $requestUpd['to_user_id'] = $_POST['to_user_id'];
    $requestUpd['updated_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->update($requestUpd, ['id' => $requestId], 'requests');
} elseif ($_POST['exectype'] == 'deleteRequest' or $_POST['exectype'] == 'exitPlay') {
    // 申請削除時またはゲーム終了時
    $ExecMessage = '申請を削除しました。';
    $dataConnect->delete(['id' => $requestId], 'requests');
}
?>

<div class="page-title">
    <p class="page-title-text">
        <?php echo $ExecMessage ?>
    </p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <a href="/index.php" class="btn btn-primary" role="button">トップページへ</a>

            </div>
        </div>
    </div>
</div>