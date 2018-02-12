@extends('app')

<div class="page-title" style="padding-top: 50px">
	<p class="page-title-text">サインアップページ</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<!--フォーム-->
				{!! Form::open(['action' => ['AuthController@doSignUp', $SignUpUser->id]]) !!}
				<div class="form-group">
					<!--ニックネーム入力欄-->
					<label class="cont-label" for="nicknamex"><strong>ニックネーム</strong></label>
					{!! Form::input('text', 'nicknamex', null, ['required', 'class' => 'form-control', 'placeholder' => 'ニックネームを入力']) !!}
					<!--メールアドレス入力欄-->
					<label class="cont-label" for="emailx"><strong>メールアドレス</strong></label>
					{!! Form::input('text', 'emailx', null, ['required', 'class' => 'form-control', 'placeholder' => 'メールアドレスを入力']) !!}
					<!--パスワード入力欄-->
					<label class="cont-label" for="pswx"><strong>パスワード</strong></label>
					{!! Form::input('password', 'pswx', null, ['required', 'class' => 'form-control', 'placeholder' => 'パスワードを入力']) !!}
					<!--パスワード(確認)入力欄-->
					<label class="cont-label" for="pswconfx"><strong>パスワード</strong></label>
					{!! Form::input('password', 'pswconfx', null, ['required', 'class' => 'form-control', 'placeholder' => 'パスワード(確認)を入力']) !!}
				</div>
				<button type="submit" class="btn btn-primary">サインアップ</button>
				<a href="/" class="btn" style="background-color: silver; color: black">キャンセル</a>
			{!! Form::close() !!}

				<!--フォーム-->
				<form action="dosignup" method="post">
					<div class="form-group">
						<!--メールアドレス入力欄-->
						<label for="email"><strong>メールアドレス</strong></label>
						<input required="required" class="form-control" type="text" name="email" id="email" placeholder="メールアドレスを入力" value=""><br>
						<!--パスワード入力欄-->
						<label for="psw"><strong>パスワード</strong></label>
						<input required="required" class="form-control" type="password" name="psw" id="psw" placeholder="パスワードを入力" value=""><br>
						<!--パスワード(確認)入力欄-->
						<label for="pswconfirm"><strong>パスワード(確認)</strong></label>
						<input required="required" class="form-control" type="password" name="pswconfirm" id="pswconfirm" placeholder="パスワード(確認)を入力" value=""><br>
						<!--ニックネーム入力欄-->
						<label for="nickname"><strong>ニックネーム</strong></label>
						<input required="required" class="form-control" type="text" name="nickname" id="nickname" placeholder="ニックネームを入力" value=""><br>
					</div>
					<div class="form-group">
						<!--サインアップボタン-->
						<input type="submit" name="sign-up" class="btn btn-primary" value="サインアップ">
					</div>
				</form>

				<hr>

				<a href="/showsignin" class="btn btn-info" value="サインイン">アカウントを持っている方は、こちら</a>

			</div>
		</div>
	</div>
</div>