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
                        foreach($users as $ToUser) {
                            if ($ToUser['id'] !== $UserId) {
                                echo sprintf('<div class="radio-inline"><input type="radio" value=%s name="to_user_id" id="to_user_id_%s"><label for="to_user_id_%s">', $ToUser['id'], $ToUser['id'], $ToUser['id']);
                                echo $ToUser['nickname'];
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