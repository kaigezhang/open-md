@extends('layouts.backend')

@section('title', $cancer->exists ? '编辑'.$cancer->part.'处癌变信息' : '创建新癌变信息')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{!! $cancer->exists ? '编辑'.$cancer->part.'处癌变信息' : '创建新癌变信息' !!}</h5>
        </div>
    <div class="ibox-content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($cancer, [

                            'method' => $cancer->exists ? 'put' : 'post',
                            'route' => $cancer->exists ? ['backend.cancers.update', $cancer->id] : ['backend.cancers.store', 'id'.'='.$id]

                        ]) !!}
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('部位') !!}
                                        {!! Form::text('part', null, ['class' => 'form-control', 'required' => '']) !!}
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请详细填写具体部位</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('Velscope') !!}
                                        {!! Form::select('velscope', [
                                                        '' => '',
                                                        '1' => '+',
                                                        '2' => '-',
                                                        '3' => '±',
                                                    ], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('Velscope 图片') !!}
                                        {!! Form::input('hidden', 'velscope_img', null, ['id'=>'tupian1','class' => 'form-control']) !!}
                                        <br><a id="browse_server1" href="/filemanager/index.html?field_name=tupian1"><img class="tupian1-preview img-preview-sm" src=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('甲苯胺蓝染色') !!}
                                        {!! Form::select('toluidine', [
                                                        '' => '',
                                                        '1' => '+',
                                                        '2' => '-',
                                                        '3' => '±',
                                                    ], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('甲苯胺蓝染色图片') !!}
                                        {!! Form::input('hidden', 'toluidine_img', null, ['id'=>'tupian2','class' => 'form-control']) !!}
                                        <br><a id="browse_server2" href="/filemanager/index.html?field_name=tupian2"><img class="tupian2-preview img-preview-sm" src=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('组织病理结果') !!}
                                        {!! Form::select('biospy', [
                                                        '' => '',
                                                        '1' => '无',
                                                        '2' => '轻',
                                                        '3' => '中',
                                                        '4' => '重',
                                                        '5' => '癌',
                                                        '6' => '其它',
                                                    ], null, ['class' => 'form-control']) !!}
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>异常增生程度</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('组织病理结果图片') !!}
                                        {!! Form::input('hidden', 'biospy_img', null, ['id'=>'tupian3','class' => 'form-control']) !!}
                                        <br><a id="browse_server3" href="/filemanager/index.html?field_name=tupian3"><img class="tupian3-preview img-preview-sm" src=""></a>
                                    </div>
                                </div>
                            </div>
                        {!! Form::submit( $cancer->exists ? '更新癌变部位信息' : '创建新癌变部位信息', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
            </div>
    </div>
    </div>

@stop

@section('script')
    <script src={{ theme('js/plugins/iCheck/icheck.min.js') }}></script>
    <script src={{ theme('js/plugins/colorbox/jquery.colorbox-min.js') }}></script>
    <script src={{ theme('js/tupian1.js') }}></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
@stop