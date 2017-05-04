@extends('layouts.backend')

@section('title', $olp->exists ? '编辑'.$olp->site.'处OLP信息' : '添加新的OLP信息')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{!! $olp->exists ? '编辑'.$olp->site.'处OLP信息' : '添加新的OLP信息' !!}</h5>
        </div>
        <div class="ibox-content">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    {!! Form::model($olp, [
                                'method' => $olp->exists ? 'put' : 'post',
                                'route' => $olp->exists ? ['backend.olps.update', $olp->id] : ['backend.olps.store', 'id'.'='.$id]

                            ]) !!}
                <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('部位') !!}
                                    {!! Form::select('site', [
                                            '' => '',
                                            '1' => '双唇',
                                            '2' => '右颊',
                                            '3' => '左颊',
                                            '4' => '舌背',
                                            '5' => '舌腹',
                                            '6' => '口底',
                                            '7' => '硬腭',
                                            '8' => '软腭',
                                            '9' => '上颌牙龈',
                                            '10' => '下颌牙龈'

                                        ], null, ['class' => 'form-control', 'required' => '']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('白纹累计（四分法）') !!}
                                    {!! Form::select('bw', [
                                            '' => '',
                                            '1' => '1/4',
                                            '2' => '2/4',
                                            '3' => '3/4',
                                            '4' => '4/4'

                                        ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('充血面积（四分法）') !!}
                                    {!! Form::select('cx', [
                                            '' => '',
                                            '1' => '1/4',
                                            '2' => '2/4',
                                            '3' => '3/4',
                                            '4' => '4/4'
                                        ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {!! Form::label('糜烂长') !!}
                                    {!! Form::input('number', 'ml_long', null, ['class' => 'form-control', 'placeholder' => 'mm']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>最长径</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                {!! Form::label('糜烂宽') !!}
                                {!! Form::input('number','ml_wide', null, ['class' => 'form-control', 'placeholder' => 'mm']) !!}
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>与最长径垂直的最长径</span>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('部位图片') !!}
                                    {!! Form::input('hidden', 'site_img', null, ['id'=>'tupian','class' => 'form-control']) !!}
                                    <br><a id="browse_server" href="/filemanager/index.html?field_name=tupian"><img class="tupian-preview img-preview-sm" src=""></a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('是否疑似癌变') !!}<br>
                                    {!! Form::radio('cancer', 0 , true, ['class' => 'radio i-checks', 'required' => '']) !!}否&nbsp;&nbsp;
                                    {!! Form::radio('cancer', 1 , null, ['class' => 'radio i-checks', 'required' => '']) !!}是&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>  
                        {!! Form::submit( $olp->exists ? '更新OLP信息' : '添加新的OLP信息', ['class' => 'btn btn-primary']) !!}

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