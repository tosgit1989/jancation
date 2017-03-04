<?php
require_once ('app.php');
$playScores = $dataConnect->getPlayScoresOrderByWinRate();
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
                foreach ($playScores as $playScore) {
                    if ($playScore['win_count'] + $playScore['lose_count'] > 0) {
                        $bodyHtml = sprintf('勝率: %s％<br>', $playScore['win_rate']);
                    } else {
                        $bodyHtml = '-';
                    }
                    $panelHtml = $methods->getPanelHtml($playScore['nickname'], $bodyHtml, false);
                    echo $panelHtml;
                }
                ?>
                <div style="height:30px"></div>

            </div>
        </div>
    </div>
</div>