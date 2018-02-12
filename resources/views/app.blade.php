<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<title>jancation</title>
		<!--cssファイル読み込み-->
		<link href="/css/jancation.css" rel="stylesheet">
		<!--Bootstrapのcssファイル読み込み-->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!--Vueのjsファイル読み込み-->
		<script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
	</head>
	<body style="background-color:white">

		<!--ヘッダー-->
		<nav class="navbar navbar-fixed-top navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header" style="max-height: 50px">
					<a href="/" class="active navbar-brand">jancation</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li style="max-height: 50px">
							<a href="/menu" role="button">じゃんけんする</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a style="color: white">
								現在のユーザー: {{ \App\Http\Controllers\FuncController::getUserBy(1) }}
							</a>
						</li>
						<li style="max-height: 50px">
							<a href="/mypage" role="button">マイページ</a>
						</li>
						<li style="max-height: 50px">
							<a href="/dosignout" role="button">サインアウト</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>


		<!-- コンテンツ -->
		<div id="app">
		</div>

		<!--フッター-->
		<footer class="bs-docs-footer navbar-fixed-bottom" style="background-color: #000000; height: 30px">
			<div class="container">
				<p class="text-muted"></p>
			</div>
		</footer>

		<!--jQueryのjsファイル読み込み-->
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<!--Bootstrapのjsファイル読み込み-->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>