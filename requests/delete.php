<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">申請の削除</p>
</div>
<h3>本当に削除しますか？</h3>
<form method="POST" action="/requests/exec.php/<?php echo $RequestId ?>">
    <div class="form-group">
        <input class="form-control" name="exectype" type="hidden" value="deleteRequest">
    </div>
    <button class="btn btn-danger" type="submit">削除</button>
    <a href="/users/show.php/<?php echo $UserId ?>" class="btn" style="background-color: silver; color: black">いいえ</a>
</form>