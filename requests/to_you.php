<?php
require_once ('../app.php');
$ToUser = $dataConnect->getById($UserId, 'users');
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
                    if ($request['to_user_id'] == $UserId) {
                        $FromUser = $dataConnect->getById($request['from_user_id'], 'users');
                        $HeadingHtml = sprintf('%s->%s', $FromUser['nickname'], $ToUser['nickname']);
                        $BodyHtml = sprintf('<a href="/requests/play.php/%s" class="btn btn-primary" role="button">対戦</a>', $request['id']);
                        $FooterHtml = sprintf('申請日時: %s 更新日時: %s', $request['created_at'], $request['updated_at']);
                        $PanelHtml = $methods->getPanelHtml($HeadingHtml, $BodyHtml, $FooterHtml);
                        echo $PanelHtml;
                    }
                }
                ?>
                <div style="height:30px"></div>

            </div>
        </div>
    </div>
</div>