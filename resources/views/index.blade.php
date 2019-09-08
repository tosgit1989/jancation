@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">トップページ</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<h3 class="text-middle">勝率ランキング</h3>
				@if(count($playScores) >= 1)
					@foreach($playScores as $playScore)
						<div class="panel panel-primary">
							<div class="panel-heading">
								{{ $playScore->nickname }}さん
							</div>
							@if ( ($playScore->win_count) + ($playScore->lose_count) > 0 )
								<div class="panel-body">勝率: {{ 100 * ($playScore->win_count) / ( ($playScore->win_count) + ($playScore->lose_count) ) }}ﾊﾟｰｾﾝﾄ</div>
							@else
								<div class="panel-body">勝率: -</div>
							@endif
						</div>
					@endforeach
				@else
					<p>対戦結果はありません。</p>
				@endif

				<div style="height:30px"></div>

			</div>
		</div>
	</div>
</div>
@endsection
