<?php
require_once ('../app.php');
?>

<?php
foreach ($requests as $request) {
    if ($request['to_user_id'] == $UserId) {
        echo $request['id'];
        echo '<br>';
    }
}
?>