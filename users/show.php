<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">マイページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--自分の基本情報を表示-->
                <h3 class="text-middle">基本情報</h3>
                <h4>ニックネーム  : <?php echo $user['nickname'] ?></h4>
                <h4>メールアドレス: <?php echo $user['email'] ?></h4>

                <!--自分の対戦成績を表示-->
                <h3 class="text-middle"><?php echo $user['nickname'] ?>さんの対戦成績</h3>
                <p>プレイ回数: <?php echo $user['win_count'] + $user['lose_count'] ?></p>
                <p>勝ち回数: <?php echo $user['win_count'] ?></p>
                <p>負け回数: <?php echo $user['lose_count'] ?></p>
                <p>勝率: <?php echo $user['win_rate'] ?>％</p>

            </div>
        </div>
    </div>
</div>