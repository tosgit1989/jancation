<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">じゃんけんを申請する</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form method="POST" action="/requests/exec.php/new">
                    <div class="form-group">
                        <p><strong>申請情報</strong></p>
                        <input required="required" class="form-control" placeholder="対戦相手のIDを入力" name="to_user_id" type="text"><br>
                        <input class="form-control" name="exectype" type="hidden" value="newRequest">
                    </div>
                    <button class="btn btn-primary" type="submit">申請する</button>
                </form>

            </div>
        </div>
    </div>
</div>