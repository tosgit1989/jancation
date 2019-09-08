@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">申請の削除</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<strong>
							<strong>
								{{ $curPlayRequest->user_nickname }}さんへの申請
							</strong>
						</strong>
					</div>
					<div class="panel-footer">
						申請日時: {{ $curPlayRequest->created_at }} 更新日時: {{ $curPlayRequest->updated_at }}
					</div>
				</div>

				<p>本当に削除しますか？</p>
				{!! Form::open(['action' => ['PlayRequestsController@postDelete', $curPlayRequest->id], 'style' => 'display: inline']) !!}
				<button type="submit" class="btn btn-danger">はい</button>
				{!! Form::close() !!}
				<a href="{{ url($backTo) }}" class="btn" style="background-color: silver; color: black">いいえ</a>

			</div>
		</div>
	</div>
</div>
@endsection