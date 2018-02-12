@extends('app')

<div class="page-title" style="padding-top: 50px">
	<p class="page-title-text">サインインページ</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<!--フォーム-->
				{!! Form::open(['action' => ['AuthController@doSignIn', $SignInUser->id]]) !!}
				<div class="form-group">
					<!--メールアドレス入力欄-->
					<label class="cont-label" for="emailx"><strong>メールアドレス</strong></label>
					{!! Form::input('text', 'emailx', null, ['required', 'class' => 'form-control', 'placeholder' => 'メールアドレスを入力']) !!}
					<!--パスワード入力欄-->
					<label class="cont-label" for="pswx"><strong>パスワード</strong></label>
					{!! Form::input('password', 'pswx', null, ['required', 'class' => 'form-control', 'placeholder' => 'パスワードを入力']) !!}
				</div>
				<button type="submit" class="btn btn-primary">サインイン</button>
				<a href="/" class="btn" style="background-color: silver; color: black">キャンセル</a>
				{!! Form::close() !!}

				<a href="/showsignup" class="btn btn-info" value="サインイン">アカウントを持っていない方は、こちら</a>

			</div>
		</div>
	</div>
</div>