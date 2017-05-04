@extends('layouts.backend')

@section('title', '删除'.$olk->site.'处OLK信息')


@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        {{-- <span class="label label-primary pull-right">今天</span> --}}
        <h5>{!! '删除'.$olk->site.'处OLK信息' !!}</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['method' => 'delete', 'route' => ['backend.olks.destroy', $olk->id]]) !!}
                <div class="alert alert-danger">
                    
                    <strong>警告!</strong>您正在删除敏感信息！

                </div>
                {!! Form::submit('确认删除', ['class' => 'btn btn-danger']) !!}
                <a href="{{ route('backend.clinicals.edit', $clinical) }}" class="btn btn-success">
                    <strong>取消</strong>
                </a>

                {!! Form::close() !!}
            </div>
        </div>
        
    </div>
</div>
@endsection