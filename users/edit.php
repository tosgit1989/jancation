<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<!--フォーム-->
<form method="POST" action="/users/exec.php/<?php echo $UserId ?>">
    <div class="form-group">
        <p><strong>メールアドレス</strong></p>
        <input required="required" class="form-control" placeholder="メールアドレスを入力" name="email" type="text" value="<?php echo $user['email'] ?>"><br>
        <p><strong>ニックネーム</strong></p>
        <input required="required" class="form-control" placeholder="ニックネームを入力" name="nickname" type="text" value="<?php echo $user['nickname'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">更新する</button>
</form>