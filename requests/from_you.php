<?php
require_once ('../app.php');
?>

<?php
foreach ($requests as $request) {
    if ($request['from_user_id'] == $UserId) {
        echo $request['id'];
        echo sprintf('<a href="/requests/edit.php/%s">編集</a>', $request['id']);
        echo sprintf('<a href="/requests/delete.php/%s">削除</a>', $request['id']);
        echo '<br>';
    }
}
?>