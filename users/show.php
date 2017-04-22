<?php
require_once ('../app.php');
$fromUser = $dataConnect->getById($userId, 'users');
$tabStatus = $methods->getTabOrContentSta($_POST['actNum'], 'tab');
$contentStatus = $methods->getTabOrContentSta($_POST['actNum'], 'content');
?>

<div class="page-title">
    <p class="page-title-text">マイページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--タブ-->
                <ul class="nav nav-tabs">
                    <li class=<?php echo $tabStatus[1] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform1.submit();return false;">基本情報</a>
                        <form name="tabform1" method="POST" action="/users/show.php/<?php echo $userId ?>">
                            <input type="hidden" name="actNum" value=1>
                        </form>
                    </li>
                    <li class=<?php echo $tabStatus[2] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform2.submit();return false;">対戦成績</a>
                        <form name="tabform2" method="POST" action="/users/show.php/<?php echo $userId ?>">
                            <input type="hidden" name="actNum" value=2>
                        </form>
                    </li>
                    <li class=<?php echo $tabStatus[3] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform3.submit();return false;">申請一覧</a>
                        <form name="tabform3" method="POST" action="/users/show.php/<?php echo $userId ?>">
                            <input type="hidden" name="actNum" value=3>
                        </form>
                    </li>
                </ul>
                <!-- / タブ-->
                <!--コンテンツ-->
                <div id="myTabContent" class="tab-content">
                    <div <?php echo $contentStatus[1] ?>>
                        <!--自分の基本情報を表示-->
                        <h3 class="text-middle">基本情報</h3>
                        <h4>ニックネーム  : <?php echo $user['nickname'] ?></h4>
                        <h4>メールアドレス: <?php echo $user['email'] ?></h4>
                        <a href="/users/edit.php/<?php echo $user['id'] ?>" class="btn btn-primary" role="button">編集</a>
                    </div>
                    <div <?php echo $contentStatus[2] ?>>
                        <!--自分の対戦成績を表示-->
                        <h3 class="text-middle"><?php echo $user['nickname'] ?>さんの対戦成績</h3>
                        <p>プレイ回数: <?php echo $userScore['win_count'] + $userScore['lose_count'] ?></p>
                        <p>勝ち回数: <?php echo $userScore['win_count'] ?></p>
                        <p>負け回数: <?php echo $userScore['lose_count'] ?></p>
                        <?php
                            if ($userScore['win_count'] + $userScore['lose_count'] > 0) {
                                echo '<p>勝率: ' . $userScore['win_rate'] . '％</p>';
                            }
                        ?>
                    </div>
                    <div <?php echo $contentStatus[3] ?>>
                        <h3><?php echo $user['nickname'] ?>さんのじゃんけん申請一覧</h3>
                        <?php
                        foreach ($requests as $request) {
                            if ($request['from_user_id'] == $userId) {
                                $toUser = $dataConnect->getById($request['to_user_id'], 'users');
                                $headingHtml = sprintf('%s→%s', $fromUser['nickname'], $toUser['nickname']);
                                $bodyHtml = sprintf('<a href="/requests/edit.php/%s" class="btn btn-primary" role="button">編集</a>', $request['id'])
                                            . ' '
                                            . sprintf('<a href="/requests/delete.php/%s" class="btn btn-danger" role="button">削除</a>', $request['id']);
                                $footerHtml = sprintf('申請日時: %s 更新日時: %s', $request['created_at'], $request['updated_at']);
                                $panelHtml = $methods->getPanelHtml($headingHtml, $bodyHtml, $footerHtml);
                                echo $panelHtml;
                            }
                        }
                        ?>
                        <div style="height:30px"></div>
                    </div>
                </div>
                <!-- /コンテンツ-->

            </div>
        </div>
    </div>
</div>