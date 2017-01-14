<?php
require_once ('app.php');
$WinRateRankers = $dataConnect->getUsersOrderByWinRate();
?>

<div style="height:50px; background-color:transparent"></div>
<h3 class="text-middle">勝率ランキング</h3>
<?php
foreach ($WinRateRankers as $WinRateRanker) {
    echo sprintf('<p>ニックネーム: %s</p>', $WinRateRanker['nickname']);
    echo sprintf('<p>勝率: %s％</p><br>', $WinRateRanker['win_rate']);
}
?>