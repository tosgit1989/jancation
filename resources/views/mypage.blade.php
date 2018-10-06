@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">マイページ</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<!--自分の基本情報を表示-->
				<h3 class="text-middle">基本情報</h3>
				<h4>ニックネーム  : {{ Auth::user()->nickname }}</h4>
				<h4>メールアドレス: {{ Auth::user()->email }}</h4>

				<hr>

				<!--自分の対戦成績を表示-->
				<h3 class="text-middle">{{ Auth::user()->nickname }}さんの対戦成績</h3>
				@if (count($curPlayScore) >= 1)
					<p>プレイ回数: {{ ($curPlayScore->win_count) + ($curPlayScore->lose_count) }}</p>
					<p>勝ち回数: {{ $curPlayScore->win_count }}</p>
					<p>負け回数: {{ $curPlayScore->lose_count }}</p>
				@else
					<p>プレイ回数: 0</p>
					<p>勝ち回数: 0</p>
					<p>負け回数: 0</p>
				@endif
				<hr>

				<!--自分のじゃんけん申請一覧を表示-->
				<h3>{{ Auth::user()->nickname }}さんのじゃんけん申請一覧</h3>
				@if (count($PlayRequestsFromYou) >= 1)
					@foreach($PlayRequestsFromYou as $PlayRequest)
						<div class="panel panel-primary">
							<div class="panel-heading">
								<strong>
									{{ $PlayRequest->user_nickname }}さんへの申請
								</strong>
							</div>
							<div class="panel-body">
								<a href="/editplayrequest/{{ $PlayRequest->id }}" class="btn btn-primary">編集</a>
								<a href="/deleteplayrequest/{{ $PlayRequest->id }}" class="btn btn-danger">削除</a>
							</div>
							<div class="panel-body">
								申請日時: {{ $PlayRequest->created_at }} 更新日時: {{ $PlayRequest->updated_at }}
							</div>
						</div>
					@endforeach
				@else
					<p>申請はありません。</p>
				@endif

				<div style="height:30px"></div>
				<!-- /コンテンツ-->

			</div>
		</div>
	</div>
</div>
@endsection
