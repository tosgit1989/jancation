<?php
require_once ('../app.php');

if ($_POST['exectype'] == 'newRequest') {
    // 申請新規作成時
    $ExecMessage = '申請が完了しました。';
    $requestNew['to_user_id'] = $_POST['to_user_id'];
    $requestNew['from_user_id'] = $UserId;
    $requestNew['created_at'] = $now = date('Y/m/d H:i:s');
    $requestNew['updated_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insert($requestNew, 'requests');
} elseif ($_POST['exectype'] == 'editRequest') {
    // 申請更新時
    $ExecMessage = '申請を更新しました。';
    $requestUpd['to_user_id'] = $_POST['to_user_id'];
    $requestUpd['updated_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->update($requestUpd, ['id' => $RequestId], 'requests');
} elseif ($_POST['exectype'] == 'deleteRequest' or $_POST['exectype'] == 'exitPlay') {
    // 申請削除時またはゲーム終了時
    $ExecMessage = '申請を削除しました。';
    $dataConnect->delete(['id' => $RequestId], 'requests');
}
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">
        <?php echo $ExecMessage ?>
    </p>
</div>
<a href="/index.php">トップページへ</a>