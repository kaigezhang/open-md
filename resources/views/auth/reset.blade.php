@extends('layouts.auth')

@section('title', '重置密码')

@section('heading', '请输入您的新密码')

@section('content')
	{!! Form::open() !!}
	{!! Form::hidden('token', $token) !!}

		<div class="form-group">
			{{-- {!! Form::label('邮箱地址') !!} --}}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=> '邮箱地址']) !!}
		</div>
		<div class="form-group">
			{{-- {!! Form::label('新密码') !!} --}}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder'=> '新密码']) !!}
		</div>
		<div class="form-group">
			{{-- {!! Form::label('确认密码') !!} --}}
			{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=> '确认密码']) !!}
		</div>

		{!! Form::submit('重置密码', ['class' => 'btn btn-primary block full-width m-b']) !!}



	{!! Form::close() !!}

@endsection
