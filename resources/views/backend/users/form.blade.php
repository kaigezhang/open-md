@extends('layouts.backend')

@section('title', $user->exists ? '编辑'.$user->name : '创建新用户')

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    {{-- <span class="label label-primary pull-right">今天</span> --}}
    <h5>{!! $user->exists ? '编辑' . $user->name : '创建新用户' !!}</h5>
</div>
<div class="ibox-content">

    {{-- <div class="row">
        <div class="col-md-6">
            <h1 class="no-margins">&yen; 406,420</h1>
            <div class="font-bold text-navy">44% <i class="fa fa-level-up"></i> <small>增长较快</small>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="no-margins">206,120</h1>
            <div class="font-bold text-navy">22% <i class="fa fa-level-up"></i> <small>增长较慢</small>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($user, [

                        'method' => $user->exists ? 'put' : 'post',
                        'route' => $user->exists ? ['backend.users.update', $user->id] : ['backend.users.store']

                    ]) !!}

                <div class="form-group">
                    {!! Form::label('姓名') !!}

                    {!! Form::text('name', null, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('邮箱地址') !!}

                    {!! Form::text('email', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-group">

                    {!! Form::label('角色') !!}

                    {!! Form::select('roles', $roles->lists('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('密码') !!}

                    {!! Form::password('password', ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('确认密码') !!}

                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                </div>


                {!! Form::submit( $user->exists ? '保存用户' : '创建新用户', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>

</div>
</div>
@stop
