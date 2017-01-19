<?php
require_once ('app.php');
$WinRateRankers = $dataConnect->getUsersOrderByWinRate();
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">トップページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3 class="text-middle">勝率ランキング</h3>
                <?php
                foreach ($WinRateRankers as $WinRateRanker) {
                    echo sprintf('<p>ニックネーム: %s</p>', $WinRateRanker['nickname']);
                    if ($WinRateRanker['win_count'] + $WinRateRanker['lose_count'] > 0) {
                        echo sprintf('<p>勝率: %s％</p><br>', $WinRateRanker['win_rate']);
                    }
                    
                }
                ?>

            </div>
        </div>
    </div>
</div>