<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">じゃんけんする</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3>いずれか1つを選択</h3>
                <a href="/requests/new.php">じゃんけんを申請する</a>
                <a href="/requests/to_you.php">あなたへの申請一覧</a>
                <a href="/requests/from_you.php">あなたからの申請一覧</a>

            </div>
        </div>
    </div>
</div>