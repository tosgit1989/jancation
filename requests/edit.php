<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">申請を編集する</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form method="POST" action="/requests/exec.php/<?php echo $RequestId ?>">
                    <div class="form-group">
                        <p><strong>申請情報</strong></p>
                        <input required="required" class="form-control" placeholder="対戦相手のIDを入力" name="to_user_id" type="text" value="<?php echo $request['to_user_id'] ?>"><br>
                        <input class="form-control" name="exectype" type="hidden" value="editRequest">
                    </div>
                    <button class="btn btn-primary" type="submit">更新する</button>
                </form>

            </div>
        </div>
    </div>
</div>