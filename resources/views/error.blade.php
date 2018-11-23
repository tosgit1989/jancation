@extends('layouts.app')

@section('content')
<div class="page-title">
	<p class="page-title-text">エラー</p>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bs-docs-section">

				<h3 class="text-middle">エラーが発生しました。</h3>
				<p>{{ $errorMsg }}</p>
				<a href="{{ $backTo }}" class="btn btn-primary" role="button">戻る</a>
				<a href="{{ url('/') }}" class="btn btn-primary" role="button">トップページへ</a>

			</div>
		</div>
	</div>
</div>
@endsection
