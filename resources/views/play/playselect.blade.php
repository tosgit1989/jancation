@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">あなたへの申請一覧</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<div style="height:30px"></div>
				@if(count($playRequestsToYou) >= 1)
					@foreach($playRequestsToYou as $playRequest)
						<div class="panel panel-primary">
							<div class="panel-heading">
								<strong>
									{{ $playRequest->user_nickname }}さんからの申請
								</strong>
							</div>
							<div class="panel-body">
								<a href="{{ url('/playhand/'.$playRequest->id) }}" class="btn btn-primary">対戦</a>
							</div>
							<div class="panel-footer">
								申請日時: {{ $playRequest->created_at }} 更新日時: {{ $playRequest->updated_at }}
							</div>
						</div>
					@endforeach
				@else
					<p>申請はありません。</p>
				@endif

			</div>
		</div>
	</div>
</div>
@endsection