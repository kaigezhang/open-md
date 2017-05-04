@extends('layouts.backend')

@section('title', $baseinfo->exists ? '编辑第'.$baseinfo->times.'次基础信息' : '创建新病人信息')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $baseinfo->exists ? '编辑第'.$baseinfo->times.'次基础信息' : '创建新病人信息' !!}</h5>
    <a class="pull-right" href="{{ route('backend.patients.show', $patient->id ) }}"><span class="btn btn-warning btn-xs">返回该病人随访记录</span></a>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($baseinfo, [

                        'method' => $baseinfo->exists ? 'put' : 'post',
                        'route' => $baseinfo->exists ? ['backend.baseinfos.update', $baseinfo->id] : ['backend.baseinfos.store', 'id'.'='.$id]

                    ]) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('记录者姓名') !!}

                            {!! Form::text('recorder', null, ['class' => 'form-control', 'minlength' => 2, 'required' => '']) !!}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('病例图片') !!}

                            {!! Form::input('hidden', 'bingli', null, ['id'=>'tupian', 'class' => 'form-control']) !!}
                            <br><a id="browse_server" href="/filemanager/index.html?field_name=tupian"><img class="tupian-preview img-preview-sm" src=""></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('手机号码') !!}

                            {!! Form::text('mphone', null, ['class' => 'form-control', 'minlength' => 11]) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('座机号码') !!}

                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('邮箱') !!}

                            {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('家庭地址') !!}
                            {!! Form::text('address', null, ['class' => 'form-control', 'required' => '']) !!}

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('QQ号') !!}

                            {!! Form::text('qq', null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('微信号') !!}

                            {!! Form::text('weixin', null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div> 
                <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                            {!! Form::label('现就业状态') !!}<br>
                            {!! Form::radio('job_status', 1 , null, ['class' => 'radio i-checks']) !!}在职&nbsp;&nbsp;
                            {!! Form::radio('job_status', 2 , null, ['class' => 'radio i-checks']) !!}失业&nbsp;&nbsp;
                            {!! Form::radio('job_status', 3 , null, ['class' => 'radio i-checks']) !!}退休&nbsp;&nbsp;
                            {!! Form::radio('job_status', 4 , true, ['class' => 'radio i-checks']) !!}其他&nbsp;&nbsp;
                        
                        </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                            {!! Form::label('（原）主要职业') !!}
                        
                            {!! Form::text('job', null, ['class' => 'form-control']) !!}
                        
                        </div>
                   </div>
               </div>           
                    
                    
                    <div class="form-group">
                        {!! Form::label('教育程度') !!}<br>
                        {!! Form::radio('education', 1 , null, ['class' => 'radio i-checks']) !!}小学&nbsp;&nbsp;
                        {!! Form::radio('education', 2 , null, ['class' => 'radio i-checks']) !!}中学&nbsp;&nbsp;
                        {!! Form::radio('education', 3 , null, ['class' => 'radio i-checks']) !!}大学及以上&nbsp;&nbsp;
                        {!! Form::radio('education', 4 , true, ['class' => 'radio i-checks']) !!}其他&nbsp;&nbsp;
                    
                    </div>
                    <div class="form-group">
                        {!! Form::label('居住地区') !!}<br>
                        {!! Form::radio('living', 1 , null, ['class' => 'radio i-checks']) !!}市区&nbsp;&nbsp;
                        {!! Form::radio('living', 2 , null, ['class' => 'radio i-checks']) !!}郊区&nbsp;&nbsp;
                        {!! Form::radio('living', 3 , null, ['class' => 'radio i-checks']) !!}农村&nbsp;&nbsp;
                        {!! Form::radio('living', 4 , true, ['class' => 'radio i-checks']) !!}其他&nbsp;&nbsp;
                    
                    </div>
                    <div class="form-group">
                        {!! Form::label('居住状态') !!}<br>
                        {!! Form::radio('living_status', 1 , null, ['class' => 'radio i-checks']) !!}独居&nbsp;&nbsp;
                        {!! Form::radio('living_status', 2 , null, ['class' => 'radio i-checks']) !!}与同伴合居&nbsp;&nbsp;
                        {!! Form::radio('living_status', 3 , null, ['class' => 'radio i-checks']) !!}与家人合居&nbsp;&nbsp;
                        {!! Form::radio('living_status', 4 , true, ['class' => 'radio i-checks']) !!}其他&nbsp;&nbsp;
                    
                    </div>

                {!! Form::submit( $baseinfo->exists ? '保存病人信息' : '创建新病人信息', ['class' => 'btn btn-primary']) !!}

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
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green"})});
    </script>

@stop
