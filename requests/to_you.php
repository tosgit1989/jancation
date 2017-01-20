<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">あなたへの申請一覧</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <?php
                foreach ($requests as $request) {
                    if ($request['to_user_id'] == $UserId) {
                        $HeadingHtml = sprintf('%s->%s', $request['from_user_id'], $UserId);
                        $BodyHtml = sprintf('<a href="/requests/play.php/%s">対戦</a>', $request['id']);
                        $FooterHtml = sprintf('申請日時: %s 更新日時: %s', $request['created_at'], $request['updated_at']);
                        $PanelHtml = $methods->getPanelHtml($HeadingHtml, $BodyHtml, $FooterHtml);
                        echo $PanelHtml;
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>