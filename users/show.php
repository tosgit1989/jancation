<?php
require_once ('../app.php');
$FromUser = $dataConnect->getById($UserId, 'users');
$TabStatus = $methods->getTabStatus($_POST['tab']);
$ContentStatus = $methods->getContentStatus($_POST['tab']);
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
                    <li class=<?php echo $TabStatus['tab1'] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform1.submit();return false;">基本情報</a>
                        <form name="tabform1" method="POST" action="/users/show.php/<?php echo $UserId ?>">
                            <input type="hidden" name="tab" value="tab1">
                        </form>
                    </li>
                    <li class=<?php echo $TabStatus['tab2'] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform2.submit();return false;">対戦成績</a>
                        <form name="tabform2" method="POST" action="/users/show.php/<?php echo $UserId ?>">
                            <input type="hidden" name="tab" value="tab2">
                        </form>
                    </li>
                    <li class=<?php echo $TabStatus['tab3'] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform3.submit();return false;">申請一覧</a>
                        <form name="tabform3" method="POST" action="/users/show.php/<?php echo $UserId ?>">
                            <input type="hidden" name="tab" value="tab3">
                        </form>
                    </li>
                </ul>
                <!-- / タブ-->
                <!--コンテンツ-->
                <div id="myTabContent" class="tab-content">
                    <div <?php echo $ContentStatus['tab1'] ?>>
                        <!--自分の基本情報を表示-->
                        <h3 class="text-middle">基本情報</h3>
                        <h4>ニックネーム  : <?php echo $user['nickname'] ?></h4>
                        <h4>メールアドレス: <?php echo $user['email'] ?></h4>
                        <a href="/users/edit.php/<?php echo $user['id'] ?>" class="btn btn-primary" role="button">編集</a>
                    </div>
                    <div <?php echo $ContentStatus['tab2'] ?>>
                        <!--自分の対戦成績を表示-->
                        <h3 class="text-middle"><?php echo $user['nickname'] ?>さんの対戦成績</h3>
                        <p>プレイ回数: <?php echo $user['win_count'] + $user['lose_count'] ?></p>
                        <p>勝ち回数: <?php echo $user['win_count'] ?></p>
                        <p>負け回数: <?php echo $user['lose_count'] ?></p>
                        <?php
                            if ($user['win_count'] + $user['lose_count'] > 0) {
                                echo '<p>勝率: ' . $user['win_rate'] . '％</p>';
                            }
                        ?>
                    </div>
                    <div <?php echo $ContentStatus['tab3'] ?>>
                        <h3><?php echo $user['nickname'] ?>さんのじゃんけん申請一覧</h3>
                        <?php
                        foreach ($requests as $request) {
                            if ($request['from_user_id'] == $UserId) {
                                $ToUser = $dataConnect->getById($request['to_user_id'], 'users');
                                $HeadingHtml = sprintf('%s→%sっっｚ', $FromUser['nickname'], $ToUser['nickname']);
                                $BodyHtml = sprintf('<a href="/requests/edit.php/%s" class="btn btn-primary" role="button">編集</a>', $request['id'])
                                            . sprintf('<a href="/requests/delete.php/%s" class="btn btn-danger" role="button">削除</a>', $request['id']);
                                $FooterHtml = sprintf('申請日時: %s 更新日時: %s', $request['created_at'], $request['updated_at']);
                                $PanelHtml = $methods->getPanelHtml($HeadingHtml, $BodyHtml, $FooterHtml);
                                echo $PanelHtml;
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