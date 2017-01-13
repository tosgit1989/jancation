<?php
require_once ('../app.php');
if ($_POST['exectype'] == 'exitPlay') {
    // 申請削除時またはゲーム終了時
    $ExecMessage = '申請を削除しました。';
    $dataConnect->delete(['id' => $RequestId], 'requests');
}
?>

<a href="/index.php">トップページへ</a>