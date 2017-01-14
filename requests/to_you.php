<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">あなたへの申請一覧</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <?php
                foreach ($requests as $request) {
                    if ($request['to_user_id'] == $UserId) {
                        echo $request['id'];
                        echo sprintf('<a href="/requests/play.php/%s">対戦</a>', $request['id']);
                        echo '<br>';
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>