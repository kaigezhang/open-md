@extends('layouts.backend')

@section('title', $result->exists ? '编辑'.$result->name : '创建新检查结果')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $result->exists ? '编辑' . $result->name : '创建新检查结果' !!}</h5>
    <a class="pull-right" href="{{ route('backend.patients.show', $patient->id ) }}"><span class="btn btn-warning btn-xs">返回该病人随访记录</span></a>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($result, [

                        'method' => $result->exists ? 'put' : 'post',
                        'route' => $result->exists ? ['backend.results.update', $result->id] : ['backend.results.store', 'id'.'='.$id]

                    ]) !!}
                    @if($result->exists)
                        @include('backend.results.cancer')
		    @else
                        <div class="col-md-8 col-md-offset-2">
                            <span class="help-block text-danger"><i class="fa fa-info-circle"></i>添加癌变部位，请先保存本表格，继续添加栏会自动显示</span>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('血常规') !!}
                                {!! Form::input('hidden','blood_img', null, ['id'=>'tupian1','class' => 'form-control']) !!}
                                <br><a id="browse_server1" href="/filemanager/index.html?field_name=tupian1"><img class="tupian1-preview img-preview-sm" src=""></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('血糖') !!}
                                {!! Form::input('hidden','blood_sugar_img', null, ['id'=>'tupian2','class' => 'form-control']) !!}
                                <br><a id="browse_server2" href="/filemanager/index.html?field_name=tupian2"><img class="tupian2-preview img-preview-sm" src=""></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('肝肾功') !!}
                                {!! Form::input('hidden','liver_img', null, ['id'=>'tupian3','class' => 'form-control']) !!}
                                <br><a id="browse_server3" href="/filemanager/index.html?field_name=tupian3"><img class="tupian3-preview img-preview-sm" src=""></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('尖锐牙尖') !!}<br>
                                {!! Form::radio('sharp_teeth', 0 , true, ['class' => 'radio i-checks']) !!} <spam>无&nbsp;&nbsp;</spam>
                                {!! Form::radio('sharp_teeth', 1 , null, ['class' => 'radio i-checks']) !!} <spam>有&nbsp;&nbsp;</spam>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('不良修复体') !!}<br>
                                {!! Form::radio('bad_fit', 0 , true, ['class' => 'radio i-checks']) !!} <spam>无&nbsp;&nbsp;</spam>
                                {!! Form::radio('bad_fit', 1 , null, ['class' => 'radio i-checks']) !!} <spam>有&nbsp;&nbsp;</spam>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('牙结石') !!}<br>
                                {!! Form::radio('calculus', 0 , true, ['class' => 'radio i-checks']) !!} <spam>无&nbsp;&nbsp;</spam>
                                {!! Form::radio('calculus', 1 , null, ['class' => 'radio i-checks']) !!} <spam>Ⅰ&nbsp;&nbsp;</spam>
                                {!! Form::radio('calculus', 2 , null, ['class' => 'radio i-checks']) !!} <spam>Ⅱ&nbsp;&nbsp;</spam>
                                {!! Form::radio('calculus', 3 , null, ['class' => 'radio i-checks']) !!} <spam>Ⅲ&nbsp;&nbsp;</spam>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('全身用药') !!}<br>
                                {!! Form::radio('sys_treat', 0 , true, ['class' => 'radio i-checks']) !!} <spam>无&nbsp;&nbsp;</spam>
                                {!! Form::radio('sys_treat', 1 , null, ['class' => 'radio i-checks']) !!} <spam>有&nbsp;&nbsp;</spam>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('药名') !!}
                                {!! Form::text('sys_drug', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('疗程') !!}
                                {!! Form::text('sys_time', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('局部用药') !!}<br>
                                {!! Form::radio('topical_treat', 0 , true, ['class' => 'radio i-checks']) !!} <spam>无&nbsp;&nbsp;</spam>
                                {!! Form::radio('topical_treat', 1 , null, ['class' => 'radio i-checks']) !!} <spam>有&nbsp;&nbsp;</spam>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('药名') !!}
                                {!! Form::text('topical_drug', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('疗程') !!}
                                {!! Form::text('topical_time', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('备注') !!}
                                {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 3]) !!}
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>上述表格未包含的其他内容</span>

                            </div>
                        </div>
                    </div>

                {!! Form::submit( $result->exists ? '保存检查结果' : '创建新检查结果', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>

</div>
</div>

@include('backend.results.cancermodel')
@stop

@section('script')
    <script src={{ theme('js/plugins/iCheck/icheck.min.js') }}></script>
    <script src={{ theme('js/plugins/colorbox/jquery.colorbox-min.js') }}></script>
    <script src={{ theme('js/tupian1.js') }}></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
@stop
