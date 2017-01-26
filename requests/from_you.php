<?php
require_once ('../app.php');
$FromUser = $dataConnect->getById($UserId, 'users');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">あなたの申請一覧</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <?php
                foreach ($requests as $request) {
                    if ($request['from_user_id'] == $UserId) {
                        $ToUser = $dataConnect->getById($request['to_user_id'], 'users');
                        $HeadingHtml = sprintf('%s->%s', $FromUser['nickname'], $ToUser['nickname']);
                        $BodyHtml = sprintf('<a href="/requests/edit.php/%s" class="btn btn-primary" role="button">編集</a>', $request['id'])
                                    . sprintf('<a href="/requests/delete.php/%s" class="btn btn-danger" role="button">削除</a>', $request['id']);
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