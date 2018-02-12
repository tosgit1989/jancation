@extends('app')

<div class="page-title" style="padding-top: 50px">
	<p class="page-title-text">
		{{ \App\Http\Controllers\FuncController::getUserBy($curPlayRequest->from_user_id) }}さんとじゃんけんの結果
	</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<p>あなた: {{ $YourHand }}, 相手: {{ $AiteHand }}</p>
				<p>判定: {{ $Judge }}</p>
				@if($Judge == 'あいこ')
					<a href="" class="btn btn-primary" role="button">もう一回</a>
				@endif
				<a href="" class="btn btn-primary" role="button">グー</a>
				<!--リンクここから-->
				<a class="active navbar-brand" href="" data-toggle="link" onclick="document.LinkToPlay3Php.submit();return false;" class="btn btn-primary" role="button">連戦する</a>
				<!--リンクここまで-->
				<!--リンクここから-->
				<a class="active navbar-brand" href="" data-toggle="link" onclick="document.LinkToExecPhp.submit();return false;" class="btn btn-danger" role="button">ゲーム終了</a>
				<!--リンクここまで-->

			</div>
		</div>
	</div>
</div>

<form name="LinkToExecPhp" method="POST" action="/requests/exec/{{ $curPlayRequest->id }}">
	<input class="form-control" name="exectype" type="hidden" value="exitPlay">
</form>