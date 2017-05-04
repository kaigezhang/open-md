@extends('layouts.auth')

@section('title', '登录页面')

@section('heading', '欢迎登录口腔恶性疾患随访登记系统')

@section('content')
	{!! Form::open([
		'class'=> 'm-t']) !!}

		<div class="form-group">
			{{-- {!! Form::label('邮箱') !!} --}}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=> '邮箱地址', 'required'=>'']) !!}
		</div>
		<div class="form-group">
			{{-- {!! Form::label('密码') !!} --}}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder'=> '密码', 'required'=>'']) !!}
		</div>

		{!! Form::submit('登录', ['class' => 'btn btn-primary block full-width m-b']) !!}

		<a href="{{ route('auth.password.email') }}" class="text-muted text-center">忘记密码？</a>



	{!! Form::close() !!}

@endsection
