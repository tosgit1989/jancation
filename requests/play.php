<?php
require_once ('../app.php');
$request = $dataConnect->getById($RequestId, 'requests');
$userYou = $dataConnect->getById($UserId, 'users');
$userAit = $dataConnect->getById($request['from_user_id'], 'users');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">
        <?php echo $userAit['nickname'] ?>さんとじゃんけん
    </p>
</div>
<h6>どの手を出しますか？</h6>
<!--グー(hand番号: 1)を出す-->
<a href="" data-toggle="link" onclick="document.Hand1.submit();return false;">グー</a>
<form name="Hand1" method="POST" action="/requests/result.php/<?php echo $RequestId ?>">
    <input type="hidden" name="hand" value=1>
</form>
<!--チョキ(hand番号: 2)を出す-->
<a href="" data-toggle="link" onclick="document.Hand2.submit();return false;">チョキ</a>
<form name="Hand2" method="POST" action="/requests/result.php/<?php echo $RequestId ?>">
    <input type="hidden" name="hand" value=2>
</form>
<!--パー(hand番号: 3)を出す-->
<a href="" data-toggle="link" onclick="document.Hand3.submit();return false;">パー</a>
<form name="Hand3" method="POST" action="/requests/result.php/<?php echo $RequestId ?>">
    <input type="hidden" name="hand" value=3>
</form>