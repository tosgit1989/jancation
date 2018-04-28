@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">申請の新規作成</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				{!! Form::open(['action' => ['PlayRequestsController@postNew', $NewPlayRequest->id]]) !!}
				<div class="form-group">
					<label>対戦相手</label>
					{!! Form::select('to_user_id', $UsersOption, ['placeholder' => '選択してください']) !!}
				</div>
				<button type="submit" class="btn btn-primary">作成</button>
				<a href="/menu" class="btn" style="background-color: silver; color: black">キャンセル</a>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
@endsection