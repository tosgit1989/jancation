@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">プレイログ</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<a href="{{ url('/playlogs') }}" class="btn btn-primary" role="button">すべて</a>
				<a href="{{ url('/playlogsfromyou') }}" class="btn btn-primary" role="button">あなたからの申請</a>
				<a href="{{ url('/playlogstoyou') }}" class="btn btn-primary" role="button">あなたへの申請</a>

				<!--自分のプレイログを表示-->
				<h3 class="text-middle">{{ Auth::user()->nickname }}さんのプレイログ</h3>
				@if(count($playLogs) >= 1)
					@foreach($playLogs as $playLog)
						<div class="panel panel-primary">
							<div class="panel-body">
								{{ $playLog->created_at }}
								{{ $playLog->from_user_nickname }}
								さんからの
								{{ $playLog->to_user_nickname }}
								さんへの申請
								あなたの{{ $playLog->result == 1 ? "勝ち" : "負け" }}
							</div>
						</div>
					@endforeach
				@else
					<p>プレイログはありません。</p>
				@endif
				<hr>

				<div style="height:30px"></div>
				<!-- /コンテンツ-->

			</div>
		</div>
	</div>
</div>
@endsection
