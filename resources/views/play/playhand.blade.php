@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">
		{{ \App\Http\Controllers\FuncController::getUserBy($curPlayRequest->from_user_id) }}さんとじゃんけん
	</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<h6>どの手を出しますか？</h6>
				<!--グー(hand番号: 1)を出す-->
				<a href="/playresult/{{ $curPlayRequest->id }}/1" class="btn btn-primary" role="button">グー</a>
				<!--チョキ(hand番号: 2)を出す-->
				<a href="/playresult/{{ $curPlayRequest->id }}/2" class="btn btn-primary" role="button">チョキ</a>
				<!--パー(hand番号: 3)を出す-->
				<a href="/playresult/{{ $curPlayRequest->id }}/3" class="btn btn-primary" role="button">パー</a>

			</div>
		</div>
	</div>
</div>
@endsection
