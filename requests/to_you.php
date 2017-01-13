<?php
require_once ('../app.php');
?>

<?php
foreach ($requests as $request) {
    echo $request['id'];
    echo '<br>';
}
?>