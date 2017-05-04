@extends('layouts.backend')

@section('title', $role->exists ? '编辑'.$role->name : '创建新角色')

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $role->exists ? '编辑' . $role->name : '创建新角色' !!}</h5>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($role, [

                        'method' => $role->exists ? 'put' : 'post',
                        'route' => $role->exists ? ['backend.roles.update', $role->id] : ['backend.roles.store']

                    ]) !!}

                <div class="form-group">
                    {!! Form::label('名称') !!}

                    {!! Form::text('name', null, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('标志') !!}

                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('描述') !!}

                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('层级') !!}

                    {!! Form::select('level', [
                        '' => '',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'

                    ], null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit( $role->exists ? '保存角色' : '创建新角色', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>

</div>
</div>
@stop