<?php
require_once ('../app.php');
$toUser = $dataConnect->getById($userId, 'users');
?>

<div class="page-title">
    <p class="page-title-text">あなたへの申請一覧</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <?php
                foreach ($requests as $request) {
                    if ($request['to_user_id'] == $userId) {
                        $fromUser = $dataConnect->getById($request['from_user_id'], 'users');
                        $headingHtml = sprintf('%s→%s', $fromUser['nickname'], $toUser['nickname']);
                        $bodyHtml = sprintf('<a href="/requests/play.php/%s" class="btn btn-primary" role="button">対戦</a>', $request['id']);
                        $footerHtml = sprintf('申請日時: %s 更新日時: %s', $request['created_at'], $request['updated_at']);
                        $panelHtml = $methods->getPanelHtml($headingHtml, $bodyHtml, $footerHtml);
                        echo $panelHtml;
                    }
                }
                ?>
                <div style="height:30px"></div>

            </div>
        </div>
    </div>
</div>