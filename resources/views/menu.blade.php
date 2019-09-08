@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">メニュー</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<h3>じゃんけんの申請</h3>
				<a href="{{ url('/newplayrequest') }}" class="btn btn-primary" role="button">申請新規作成ページへ</a>

				<h3>相手を選択して対戦</h3>
				<a href="{{ url('/playselect') }}" class="btn btn-primary" role="button">あなたへの申請一覧へ</a>

				<h3>申請内容の確認・編集・削除</h3>
				<a href="{{ url('/yourplayrequests') }}" class="btn btn-primary" role="button">あなたの申請一覧へ</a>

			</div>
		</div>
	</div>
</div>
@endsection