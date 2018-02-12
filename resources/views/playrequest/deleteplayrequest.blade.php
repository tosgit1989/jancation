@extends('app')

<div class="page-title" style="padding-top: 50px">
	<p class="page-title-text">申請の削除</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<div class="panel panel-primary">
					<div class ="panel-footer" style = "height: 55px">
						<div class="col-xs-3">対戦相手のID: {{ $DeletePlayRequest->to_user_id }}</div>
					</div>
				</div>

				<p>本当に削除しますか？</p>
				{!! Form::open(['action' => ['ExecPlayRequestController@postDelete', $DeletePlayRequest->id], 'style' => 'display: inline']) !!}
				<button type="submit" class="btn btn-danger">はい</button>
				{!! Form::close() !!}
				<a href="/" class="btn" style="background-color: silver; color: black">いいえ</a>

			</div>
		</div>
	</div>
</div>
