@extends('layouts.backend')

@section('title', $patient->exists ? '编辑'.$patient->name : '创建新病人')

@section('content')


<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>{!! $patient->exists ? '编辑' . $patient->name : '创建新病人' !!}</h5>
</div>
<div class="ibox-content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($patient, [

                        'method' => $patient->exists ? 'put' : 'post',
                        'route' => $patient->exists ? ['backend.patients.update', $patient->id] : ['backend.patients.store']

                    ]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('患者编号') !!}

                            {!! Form::text('number', null, [
                            'class' => 'form-control',
                            'minlength' => 7,
                            'required' => ''
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('患者姓名') !!}

                            {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'minlength' => 2,
                            'required' => '']) !!}

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('患者性别') !!}

                            {!! Form::select('gender', [
                                '' => '',
                                '1' => '男性',
                                '2' => '女性',
                                '3' => '不确定',
                            ], null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            {!! Form::label('患者身份证号') !!}

                            {!! Form::text('card_id', null, ['class' => 'form-control',
                            'class' => 'form-control',
                            'minlength' => 18,
                            'required' => '']) !!}

                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            {!! Form::label('就诊病历号') !!}

                            {!! Form::text('case_number', null, ['class' => 'form-control',
                            'class' => 'form-control',
                            'required' => '']) !!}

                        </div>
                    </div>
                </div>

                {!! Form::submit( $patient->exists ? '保存病人信息' : '创建新病人信息', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>

</div>
</div>
@stop