@extends('layouts.backend')

@section('title', $olk->exists ? '编辑'.$olk->site.'处OLK信息' : '添加新的OLK信息')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $olk->exists ? '编辑'.$olk->site.'处OLK信息' : '添加新的OLK信息' !!}</h5>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($olk, [
                        'method' => $olk->exists ? 'put' : 'post',
                        'route' => $olk->exists ? ['backend.olks.update', $olk->id] : ['backend.olks.store', 'id'.'='.$id]

                    ]) !!}
                <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('部位') !!}
                                    {!! Form::text('site', null, ['class' => 'form-control']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请详细填写具体部位</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('分型') !!}
                                    {!! Form::select('type', [
                                            '' => '',
                                            '1' => '板块状',
                                            '2' => '皱纸状',
                                            '3' => '颗粒状',
                                            '4' => '疣状',
                                            '5' => '溃疡状'
                                        ], null, ['class' => 'form-control', 'required' => '']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {!! Form::label('长（mm）') !!}
                                    {!! Form::input('number', 'site_long', null, ['class' => 'form-control', 'placeholder' => 'mm']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>最长径</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                {!! Form::label('宽（mm）') !!}
                                {!! Form::input('number','site_wide', null, ['class' => 'form-control', 'placeholder' => 'mm']) !!}
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>与最长径垂直的最长径</span>
                            </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('是否疑似癌变') !!}<br>
                                    {!! Form::radio('cancer', 0 , true, ['class' => 'radio i-checks', 'required' => '']) !!}否&nbsp;&nbsp;
                                    {!! Form::radio('cancer', 1 , null, ['class' => 'radio i-checks', 'required' => '']) !!}是&nbsp;&nbsp;
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('部位图片') !!}
                                    {!! Form::input('hidden', 'site_img', null, ['id'=>'tupian', 'class' => 'form-control']) !!}
                                    <br><a id="browse_server" href="/filemanager/index.html?field_name=tupian"><img class="tupian-preview img-preview-sm" src=""></a>
                                </div>
                            </div>
                        </div>
                        {!! Form::submit( $olk->exists ? '更新OLK信息' : '添加新的OLK信息' , ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
</div>
</div>

@stop

@section('script')
    <script src={{ theme('js/plugins/iCheck/icheck.min.js') }}></script>
    <script src={{ theme('js/plugins/colorbox/jquery.colorbox-min.js') }}></script>
    <script src={{ theme('js/tupian.js') }}></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
@stop