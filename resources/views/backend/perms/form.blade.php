@extends('layouts.backend')

@section('title', $perm->exists ? '编辑'.$perm->name : '创建新权限')

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $perm->exists ? '编辑' . $perm->name : '创建新权限' !!}</h5>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($perm, [

                        'method' => $perm->exists ? 'put' : 'post',
                        'route' => $perm->exists ? ['backend.perms.update', $perm->id] : ['backend.perms.store']

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
                    {!! Form::label('模式（编辑特定区块时使用，可不填）') !!}

                    {!! Form::text('model', null, ['class' => 'form-control']) !!}

                </div>

                {!! Form::submit( $perm->exists ? '保存权限' : '创建新权限', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>

</div>
</div>
@stop