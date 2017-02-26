<?php
require_once ('../app.php');
$request = $dataConnect->getById($requestId, 'requests');
$userYou = $dataConnect->getById($userId, 'users');
$userAit = $dataConnect->getById($request['from_user_id'], 'users');
?>

<div class="page-title">
    <p class="page-title-text">
        <?php echo $userAit['nickname'] ?>さんとじゃんけん
    </p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h6>どの手を出しますか？</h6>
                <!--グー(hand番号: 1)を出す-->
                <a href="" data-toggle="link" onclick="document.Hand1.submit();return false;" class="btn btn-primary" role="button">グー</a>
                <form name="Hand1" method="POST" action="/requests/result.php/<?php echo $requestId ?>">
                    <input type="hidden" name="hand" value=1>
                </form>
                <!--チョキ(hand番号: 2)を出す-->
                <a href="" data-toggle="link" onclick="document.Hand2.submit();return false;" class="btn btn-primary" role="button">チョキ</a>
                <form name="Hand2" method="POST" action="/requests/result.php/<?php echo $requestId ?>">
                    <input type="hidden" name="hand" value=2>
                </form>
                <!--パー(hand番号: 3)を出す-->
                <a href="" data-toggle="link" onclick="document.Hand3.submit();return false;" class="btn btn-primary" role="button">パー</a>
                <form name="Hand3" method="POST" action="/requests/result.php/<?php echo $requestId ?>">
                    <input type="hidden" name="hand" value=3>
                </form>

            </div>
        </div>
    </div>
</div>