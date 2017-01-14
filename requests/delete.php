<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');
?>

<div style="height:50px; background-color:transparent"></div>
<h3>本当に削除しますか？</h3>
<form method="POST" action="/requests/exec.php/<?php echo $RequestId ?>">
    <div class="form-group">
        <input class="form-control" name="exectype" type="hidden" value="deleteRequest">
    </div>
    <button class="btn btn-danger" type="submit">削除</button>
    <a href="/users/show.php/<?php echo $UserId ?>" class="btn" style="background-color: silver; color: black">いいえ</a>
</form>