@extends('layouts.auth')

@section('title', '忘记密码')

@section('heading', '请提供您的邮箱地址')

@section('content')
	{!! Form::open() !!}
		<div class="form-group">
			{{-- {!! Form::label('接收验证消息的邮箱地址') !!} --}}
			{!! Form::text('email', null, ['class' => 'form-control uname', 'placeholder'=> '邮箱地址']) !!}
		</div>

		{!! Form::submit('发送密码重置邮件', ['class' => 'btn btn-primary block full-width m-b']) !!}

	{!! Form::close() !!}

@endsection
