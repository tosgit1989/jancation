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
				@if (count($PlayRequestsToYou) >= 1)
					@foreach($PlayRequestsToYou as $PlayRequest)
						<div class="panel panel-primary">
							<div class="panel-heading">
								<strong>
									{{ $PlayRequest->nickname }}さんからの申請
								</strong>
							</div>
							<div class="panel-body">
								<a href="/playhand/{{ $PlayRequest->id }}" class="btn btn-primary">対戦</a>
							</div>
							<div class="panel-footer">
								申請日時: {{ $PlayRequest->created_at }} 更新日時: {{ $PlayRequest->updated_at }}
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