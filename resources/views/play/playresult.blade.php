@extends('layouts.app')

@section('content')
<div class="page-title">
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
				<!--リンクここから-->
				<a href="/playhand/{{ $curPlayRequest->id }}" class="btn btn-primary">連戦する</a>
				<!--リンクここまで-->
				<!--リンクここから-->
				<a href="/" class="btn btn-primary">ゲーム終了</a>
				<!--リンクここまで-->

			</div>
		</div>
	</div>
</div>
@endsection