@extends('layouts.backend')

@section('title', $epibio->exists ? '编辑第'.$epibio->times.'次流行病学信息' : '创建流行病学信息')

@section('style')
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@stop

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $epibio->exists ? '编辑第'.$epibio->times.'次流行病学信息' : '创建流行病学信息' !!}</h5>
    <a class="pull-right" href="{{ route('backend.patients.show', $patient->id ) }}"><span class="btn btn-warning btn-xs">返回该病人随访记录</span></a>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($epibio, [

                        'method' => $epibio->exists ? 'put' : 'post',
                        'route' => $epibio->exists ? ['backend.epibios.update', $epibio->id] : ['backend.epibios.store', 'id'.'='.$id]

                    ]) !!}
                <h3 class="text-success">吸烟</h3>
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('吸烟') !!}<br>
                            {!! Form::radio('smoke', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('smoke', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('始吸年龄(岁)') !!}
                            {!! Form::text('smo_age', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('吸烟类型') !!}<br>
                            {!! Form::radio('smo_type', 1 , null, ['class' => 'radio i-checks']) !!}过滤嘴&nbsp;&nbsp;
                            {!! Form::radio('smo_type', 2 , null, ['class' => 'radio i-checks']) !!}非过滤嘴&nbsp;&nbsp;
                            {!! Form::radio('smo_type', 3 , true, ['class' => 'radio i-checks']) !!}其他&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('平均烟量（支/天）') !!}
                            {!! Form::text('smo_num', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('是否戒烟') !!}<br>
                            {!! Form::radio('quit_smoking', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('quit_smoking', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('戒烟时长（月）') !!}
                            {!! Form::text('smo_quit_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('被动吸烟') !!}<br>
                            {!! Form::radio('passive_smo', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('passive_smo', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('备注') !!}
                            {!! Form::textarea('smo_comments', null, ['class' => 'form-control', 'rows' => 2]) !!}
                        </div>
                    </div>
                    
                </div>
                <hr>

                <h3 class="text-success">饮酒</h3>
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('是否饮酒') !!}<br>
                            {!! Form::radio('drink', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('drink', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('开始年龄（岁）') !!}
                            {!! Form::text('dri_age', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('主要类型') !!}<br>
                            {!! Form::radio('dri_type', 1 , null, ['class' => 'radio i-checks']) !!}白酒&nbsp;&nbsp;
                            {!! Form::radio('dri_type', 2 , null, ['class' => 'radio i-checks']) !!}红酒&nbsp;&nbsp;
                            {!! Form::radio('dri_type', 3 , null, ['class' => 'radio i-checks']) !!}啤酒&nbsp;&nbsp;
                            {!! Form::radio('dri_type', 4 , true, ['class' => 'radio i-checks']) !!}其它&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('平均酒量（毫升/天）') !!}
                            {!! Form::text('capacity', null, ['class' => 'form-control']) !!}
                         </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('是否戒酒') !!}<br>
                            {!! Form::radio('quit_dri', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('quit_dri', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('戒酒时长（月）') !!}
                            {!! Form::text('dri_quit_time', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('备注') !!}
                            {!! Form::textarea('dri_comments', null, ['class' => 'form-control','rows' => 2]) !!}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('咀嚼槟榔') !!}<br>
                            {!! Form::radio('betel', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('betel', 1 , null, ['id' => 'betel', 'class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('每日用量') !!}
                            {!! Form::text('betel_dos', null, ['id' => 'betel_docs', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('咀嚼烟叶') !!}<br>
                            {!! Form::radio('tabacoo', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('tabacoo', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('每日用量') !!}
                            {!! Form::text('tabacoo_dos', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('饮食') !!}&nbsp;&nbsp;&nbsp;&nbsp;
                            {!! Form::radio('food', 1 , null, ['class' => 'radio i-checks']) !!}辛辣&nbsp;&nbsp;
                            {!! Form::radio('food', 2 , null, ['class' => 'radio i-checks']) !!}清淡&nbsp;&nbsp;
                            {!! Form::radio('food', 3 , null, ['class' => 'radio i-checks']) !!}烫食&nbsp;&nbsp;
                            {!! Form::radio('food', 4 , true, ['class' => 'radio i-checks']) !!}其它&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('系统病史') !!}<br>

                            {!! Form::radio('sys_d', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('sys_d', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('具体疾病名称') !!}
                            {!! Form::text('sys_d_details', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('家族史') !!}<br>
                            {!! Form::radio('fami_d', 0 , true, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('fami_d', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('与患者关系') !!}
                            {!! Form::text('fami_d_details', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('长期服药') !!}<br>
                            {!! Form::radio('drug', 0 , true, ['class' => 'radio i-checks', 'id' => 'drug']) !!}否&nbsp;&nbsp;
                            {!! Form::radio('drug', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('主要种类、剂量及持续时间') !!}

                            {!! Form::text('drug_details', null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>

                {!! Form::submit( $epibio->exists ? '保存流行病学信息' : '创建新流行病学信息', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
</div>
</div>

@stop

@section('script')
    <script src={{ theme('js/plugins/iCheck/icheck.min.js') }}></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green"})});
        $(document).ready(function(){
            if($("#drug").val() == 0)
            {
                $("#drug_details").addClass('disabled');
            }
        })
    </script>
@stop