<?php
require_once ('../app.php');
?>

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