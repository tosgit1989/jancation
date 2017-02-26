<?php
require_once ('../app.php');
$users = $dataConnect->getAll('users');
?>

<div class="page-title">
    <p class="page-title-text">じゃんけんを申請する</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form method="POST" action="/requests/exec.php/new">
                    <div class="form-group">
                        <p><strong>対戦相手を選択</strong></p>
                        <?php
                        foreach($users as $toUser) {
                            if ($toUser['id'] !== $userId) {
                                echo '<div class="radio-inline">';
                                echo sprintf('<input type="radio" value=%s name="to_user_id" id="to_user_id_%s">', $toUser['id'], $toUser['id']);
                                echo sprintf('<label for="to_user_id_%s">', $toUser['id']);
                                echo $toUser['nickname'];
                                echo '</label></div><br>';
                            }
                        }
                        ?>
                        <input class="form-control" name="exectype" type="hidden" value="newRequest">
                    </div>
                    <button class="btn btn-primary" type="submit">申請する</button>
                </form>

            </div>
        </div>
    </div>
</div>