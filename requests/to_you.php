<?php
require_once ('../app.php');
?>

<?php
foreach ($requests as $request) {
    if ($request['to_user_id'] == $UserId) {
        echo $request['id'];
        echo sprintf('<a href="/requests/play.php/%s">対戦</a>', $request['id']);
        echo '<br>';
    }
}
?>