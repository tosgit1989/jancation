@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">あなたの申請一覧</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<div style="height:30px"></div>
				@if (count($PlayRequests) >= 1)
					@foreach($PlayRequests as $PlayRequest)
						@if ($PlayRequest->from_user_id == Auth::user()->id)
							<div class="panel panel-primary">
								<div class="panel-heading">
									<strong>
										{{ \App\Http\Controllers\FuncController::getUserBy($PlayRequest->from_user_id) }}
											→
										{{ \App\Http\Controllers\FuncController::getUserBy($PlayRequest->to_user_id) }}
									</strong>
								</div>
								<div class="panel-body">
									<a href="/editplayrequest/{{ $PlayRequest->id }}" class="btn btn-primary">編集</a>
									<a href="/deleteplayrequest/{{ $PlayRequest->id }}" class="btn btn-danger">削除</a>
								</div>
								<div class="panel-footer">
									申請日時: {{ $PlayRequest->created_at }} 更新日時: {{ $PlayRequest->updated_at }}
								</div>
							</div>
						@endif
					@endforeach
				@else
					<p>申請はありません。</p>
				@endif

			</div>
		</div>
	</div>
</div>
@endsection