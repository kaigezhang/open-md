@extends('layouts.backend')


@section('title', '病例管理')


@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>所有病人</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
            <a href="{{ route('backend.patients.create') }}" class="btn btn-primary btn-sm"> 创建新病人</a>               
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>患者姓名</th>
                        <th>患者编号</th>
                        <th>查看</th>
                        {{--<th>随访进度</th>--}}
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>
                            <a href="{{ route('backend.patients.edit', $patient->id ) }}"> {{ $patient->name }}</a>
                        </td>
                        <td>
                            {{ $patient->number }}
                        </td>
                        <td>
                            <a href="{{ route('backend.patients.show', $patient->id ) }}">
                                <span class="btn btn-info btn-sm btn-bitbucket"><i class="fa fa-eye"></i></span></a>
                            </a>
                        </td>
                        {{--<td>--}}
                            {{--{{ $times }}--}}
                        {{--</td>--}}
                        <td>
                            <a href="{{ route('backend.patients.edit', $patient->id ) }}">
                                <span class="btn btn-warning btn-sm btn-bitbucket"><i class="fa fa-edit"></i></span></a>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('backend.patients.confirm', $patient->id ) }}">
                                <span class="btn btn-danger btn-sm btn-bitbucket"><i class="fa fa-remove"></i></span></a>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
 {!! $patients->render() !!}
@stop
