<?php
require_once ('../app.php');

$userUpd['nickname'] = $_POST['nickname'];
$userUpd['email'] = $_POST['email'];
$userUpd['updated_at'] = $now = date('Y/m/d H:i:s');
$dataConnect->update($userUpd, ['id' => $UserId], 'users');
header('Location: /index.php');
?>