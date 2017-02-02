<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');

// hand番号は、グー:1 , チョキ:2 , パー:3
$handSort = ['0', 'グー', 'チョキ', 'パー'];

// あなたの手($handYou)と相手の手($handAit)
$handYou = intval($_POST['hand']);
$handAit = rand(1, 3);

// 判定
if (($handYou - $handAit + 3) % 3 == 2) {
    // じゃんけんに勝った場合
    $judge = "あなたの勝ち";
    $dataConnect->updateScore('win', ['id' => $UserId]);
    $dataConnect->updateScore('lose', ['id' => $request['from_user_id']]);
} elseif (($handYou - $handAit + 3) % 3 == 1) {
    // じゃんけんに負けた場合
    $judge = "あなたの負け";
    $dataConnect->updateScore('lose', ['id' => $UserId]);
    $dataConnect->updateScore('win', ['id' => $request['from_user_id']]);
} else {
    // それ以外の場合
    $judge = "あいこ";
}

?>

<div class="page-title">
    <p class="page-title-text">じゃんけんの結果</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <p>あなた: <?php echo $handSort[$_POST['hand']]?>, 相手: <?php echo $handSort[$handAit]?></p>
                <p>判定: <?php echo $judge ?></p>
                <a href="/requests/play.php/<?php echo $RequestId ?>" class="btn btn-primary" role="button">連戦する</a>
                <a href="" data-toggle="link" onclick="document.LinkToExecPhp.submit();return false;" class="btn btn-danger" role="button">ゲーム終了</a>

                <!--hidden form-->
                <form name="LinkToExecPhp" method="POST" action="/requests/exec.php/<?php echo $RequestId ?>">
                    <input class="form-control" name="exectype" type="hidden" value="exitPlay">
                </form>

            </div>
        </div>
    </div>
</div>