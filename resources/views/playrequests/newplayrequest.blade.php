@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">申請の新規作成</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				{!! Form::open(['action' => ['PlayRequestsController@postNew', $newPlayRequest->id]]) !!}
					@if(count($usersOption) > 0)
						<div class="form-group">
							<label>対戦相手</label>
							<select name="to_user_id">
								@foreach($usersOption as $userOption)
									<option value={{ $userOption->id }}>{{ $userOption->nickname }}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary">作成</button>
					@else
						<p>他のユーザーが存在しないため申請を新規作成できません。</p>
					@endif
					<a href="{{ url('/menu') }}" class="btn" style="background-color: silver; color: black">キャンセル</a>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
@endsection