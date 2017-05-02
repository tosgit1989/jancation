<?php
session_start();

require_once('var.php');
require_once('sessioncheck.php');

$headerStatus = $methods->getHeaderStatus($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>jancation</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/application.css">
</head>
<body>

<!--ヘッダー-->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php
            if (isset($_SESSION['id'])) {
                echo '<a class="active navbar-brand" href="/index.php">jancation</a>';
            } else {
                echo '<a class="active navbar-brand">jancation</a>';
            }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul <?php echo $headerStatus ?> class="nav navbar-nav">
                <li>
                    <a href="/requests/which.php">じゃんけんする</a>
                </li>
            </ul>
            <ul <?php echo $headerStatus ?> class="nav navbar-nav navbar-right">
                <li>
                    <a style="color: white">現在のユーザー: <?php echo $user['nickname'] ?></a>
                </li>
                <li>
                    <a href="/users/show.php/<?php echo $userId ?>">マイページ</a>
                </li>
                <li>
                    <a href="/users/session.php/signOut">サインアウト</a>
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