<div class="page-title">
	<p class="page-title-text">マイページ</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<!--タブ-->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#tab1">基本情報</a>
					</li>
					<li class="nav-item">
						<a href="#tab2">対戦成績</a>
					</li>
					<li class="nav-item">
						<a href="#tab3">申請一覧</a>
					</li>
				</ul>

				<!--コンテンツ-->
				<div class="tab-content">
					<div id="tab1" class="tab-pane active">
						<!--自分の基本情報を表示-->
						<h3 class="text-middle">基本情報</h3>
						<h4>ニックネーム  : <?= 'nickname' ?></h4>
						<h4>メールアドレス: <?= 'email' ?></h4>
						<a href="" class="btn btn-primary" role="button">編集</a>
					</div>
					<div id="tab2" class="tab-pane">
						<!--自分の対戦成績を表示-->
						<h3 class="text-middle"><?= 'nickname' ?>さんの対戦成績</h3>
						<p>プレイ回数: </p>
						<p>勝ち回数: </p>
						<p>負け回数: </p>
					</div>
					<div id="tab3" class="tab-pane">
						<h3><?= 'nickname' ?>さんのじゃんけん申請一覧</h3>

						<div style="height:30px"></div>
					</div>
				</div>
				<!-- /コンテンツ-->

			</div>
		</div>
	</div>
</div>