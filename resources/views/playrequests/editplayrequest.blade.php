@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">申請の編集</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				{!! Form::open(['action' => ['PlayRequestsController@postEdit', $curPlayRequest->id]]) !!}
					@if(count($UsersOption) > 0)
						<div class="form-group">
							<label>対戦相手</label>
							<select name="to_user_id">
								@foreach($UsersOption as $UserOption)
									@if($UserOption->id == $curPlayRequest->to_user_id)
										<option value={{ $UserOption->id }} selected>{{ $UserOption->nickname }}</option>
									@else
										<option value={{ $UserOption->id }}>{{ $UserOption->nickname }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary">更新</button>
					@else
						<p>他のユーザーが存在しないため申請を編集できません。</p>
					@endif
				<a href={{ $BackTo }} class="btn" style="background-color: silver; color: black">キャンセル</a>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
@endsection