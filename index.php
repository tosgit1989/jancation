<?php
require_once ('app.php');
$WinRateRankers = $dataConnect->getUsersOrderByWinRate();
?>

<div class="page-title">
    <p class="page-title-text">トップページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3 class="text-middle">勝率ランキング</h3>
                <?php
                foreach ($WinRateRankers as $WinRateRanker) {
                    if ($WinRateRanker['win_count'] + $WinRateRanker['lose_count'] > 0) {
                        $BodyHtml = sprintf('勝率: %s％<br>', $WinRateRanker['win_rate']);
                    } else {
                        $BodyHtml = '-';
                    }
                    $PanelHtml = $methods->getPanelHtml($WinRateRanker['nickname'], $BodyHtml, false);
                    echo $PanelHtml;
                }
                ?>
                <div style="height:30px"></div>

            </div>
        </div>
    </div>
</div>