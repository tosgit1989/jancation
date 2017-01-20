<?php
require_once ('/Users/kagatoshio/projects/jancation/src/Services/DataHandler.php');
require_once ('/Users/kagatoshio/projects/jancation/src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$requests = $dataConnect->getAll('requests');
$RequestId = $methods->getRequestId($_SERVER['REQUEST_URI']);

session_start();

if ($_SERVER['REQUEST_URI'] == '/users/sign_in.php' or $_SERVER['REQUEST_URI'] == '/users/sign_up.php') {
    //サインイン(orサインアップ)ページに移動した場合
    unset($_SESSION['id']);
} elseif ($_SESSION['id'] < 1) {
    //セッションが効いていない状態でサインイン(orサインアップ)ページ以外のページに移動した場合
    header('Location: /users/sign_in.php');
} else {
    //セッションが効いている状態でサインイン(orサインアップ)ページ以外のページに移動した場合
    $UserId = $_SESSION['id'];
    $user = $dataConnect->getById($UserId, 'users');
}

$HeaderStatus = $methods->getHeaderStatus($_SESSION['id']);

?>

<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<!--ヘッダー-->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/index.php">jancation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul <?php echo $HeaderStatus ?> class="nav navbar-nav">
                <li>
                    <a href="/requests/which.php">じゃんけんする</a>
                </li>
            </ul>
            <ul <?php echo $HeaderStatus ?> class="nav navbar-nav navbar-right">
                <li>
                    <ul style="color: white">現在のユーザー: <?php echo $user['nickname'] ?></ul>
                </li>
                <li>
                    <a href="/users/show.php/<?php echo $UserId ?>">マイページ</a>
                </li>
                <li>
                    <a href="/users/sign_in.php">サインアウト</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--フッター-->
<footer class="bs-docs-footer navbar-fixed-bottom" style="background-color: #000000; height: 30px">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>

</body>
</html>