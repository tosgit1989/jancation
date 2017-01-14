<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');
?>

<!--フォーム-->
<form method="POST" action="/requests/exec.php/<?php echo $RequestId ?>">
    <div class="form-group">
        <p><strong>申請情報</strong></p>
        <input required="required" class="form-control" placeholder="対戦相手のIDを入力" name="to_user_id" type="text" value="<?php echo $request['to_user_id'] ?>"><br>
        <input class="form-control" name="exectype" type="hidden" value="editRequest">
    </div>
    <button class="btn btn-primary" type="submit">更新する</button>
</form>