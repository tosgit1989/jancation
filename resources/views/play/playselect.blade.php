@extends('app')

<div class="page-title" style="padding-top: 50px">
	<p class="page-title-text">あなたへの申請一覧</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<div style="height:30px"></div>
				@if (count($PlayRequests) >= 1)
					@foreach($PlayRequests as $PlayRequest)
						@if ($PlayRequest->to_user_id == $curUser->id)
							<div class="panel panel-primary">
								<div class="panel-heading">
									<strong>
										{{ \App\Http\Controllers\FuncController::getUserBy($PlayRequest->from_user_id) }}
										→
										{{ \App\Http\Controllers\FuncController::getUserBy($PlayRequest->to_user_id) }}
									</strong>
								</div>
								<div class="panel-body">
									<a href="/playhand/{{ $PlayRequest->id }}" class="btn btn-primary">対戦</a>
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