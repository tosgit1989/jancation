<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');
$users = $dataConnect->getAll('users');
?>

<div class="page-title">
    <p class="page-title-text">申請を編集する</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form method="POST" action="/requests/exec.php/<?php echo $RequestId ?>">
                    <div class="form-group">
                        <p><strong>対戦相手を選択</strong></p>
                        <?php
                        foreach($users as $ToUser) {
                            if ($ToUser['id'] !== $UserId) {
                                $ischecked = '';
                                if ($ToUser['id'] == $request['to_user_id']) {$ischecked = 'checked="checked"';}
                                echo '<div class="radio-inline">';
                                echo sprintf('<input type="radio" value=%s name="to_user_id" id="to_user_id_%s" %s>', $ToUser['id'], $ToUser['id'], $ischecked);
                                echo sprintf('<label for="to_user_id_%s">', $ToUser['id']);
                                echo $ToUser['nickname'];
                                echo '</label></div><br>';
                            }
                        }
                        ?>
                        <input class="form-control" name="exectype" type="hidden" value="editRequest">
                    </div>
                    <button class="btn btn-primary" type="submit">更新する</button>
                </form>

            </div>
        </div>
    </div>
</div>