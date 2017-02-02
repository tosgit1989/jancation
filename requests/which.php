<?php
require_once ('../app.php');
?>

<div class="page-title">
    <p class="page-title-text">じゃんけんする</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3>相手を選択して対戦</h3>
                <a href="/requests/to_you.php" class="btn btn-primary" role="button">あなたへの申請一覧へ</a>

                <h3>じゃんけんの申請</h3>
                <a href="/requests/new.php" class="btn btn-primary" role="button">申請新規作成ページへ</a>

                <h3>申請内容の確認・編集・削除</h3>
                <a href="/requests/from_you.php" class="btn btn-primary" role="button">あなたの申請一覧へ</a>

            </div>
        </div>
    </div>
</div>