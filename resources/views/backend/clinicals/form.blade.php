@extends('layouts.backend')

@section('title', $clinical->exists ? '编辑病人信息' : '创建新病人信息')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $clinical->exists ? '编辑病人信息': '创建新病人信息' !!}</h5>
    <a class="pull-right" href="{{ route('backend.patients.show', $patient->id ) }}"><span class="btn btn-warning btn-xs">返回该病人随访记录</span></a>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(!($clinical->exists))
                <div class="col-md-8 col-md-offset-2">
                    <span class="help-block text-danger"><i class="fa fa-info-circle"></i>添加OLP或者是OLK的临床表现，请先点击创建本表格，继续添加栏会自动显示</span>
                </div>
            @endif
            {!! Form::model($clinical, [

                        'method' => $clinical->exists ? 'put' : 'post',
                        'route' => $clinical->exists ? ['backend.clinicals.update', $clinical->id] : ['backend.clinicals.store', 'id'.'='.$id]

                    ]) !!}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('诊断') !!}
                            {!! Form::select('diagnosis', [
                                            '' => '',
                                            '1' => 'OLK患者',
                                            '2' => 'OLK癌变患者',
                                            '3' => 'OLP患者',
                                            '4' => 'OLP癌变患者',
                                        ], null, ['class' => 'form-control', 'required' => '']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('病程（月）') !!}

                            {!! Form::input('number', 'd_course', null, ['class' => 'form-control', 'required' => '', 'digits' => 'true']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('主观症状') !!}

                            {!! Form::select('symptom', [
                                            '' => '',
                                            '1' => '无不适',
                                            '2' => '粗糙感',
                                            '3' => '刺激痛',
                                            '4' => '自发痛',
                                        ], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                @if($clinical->exists && $clinical->diagnosis == 1 || $clinical->diagnosis == 2)
                    @include('backend.clinicals.olk')
                @endif

                @if($clinical->exists && $clinical->diagnosis == 3 || $clinical->diagnosis == 4)
                    @include('backend.clinicals.olp')
                @endif
                
                
                {!! Form::submit( $clinical->exists ? '保存病人信息' : '创建新病人信息', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
               

                
    </div>
</div>

</div>

@include('backend.clinicals.olpmodel')
@include('backend.clinicals.olkmodel')

@stop

@section('script')
    <script src={{ theme('js/plugins/iCheck/icheck.min.js') }}></script>
    <script src={{ theme('js/plugins/colorbox/jquery.colorbox-min.js') }}></script>
    <script src={{ theme('js/tupian.js') }}></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
        $(document).ready($(ml_area).val("{{ $area }}"));
    </script>
@stop
