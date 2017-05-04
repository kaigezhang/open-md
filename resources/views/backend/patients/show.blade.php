@extends('layouts.backend')

@section('title', '复诊登记')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><span class="text-danger">{!! $patient->name  !!}</span>&nbsp;&nbsp;&nbsp;&nbsp;复诊情况</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
            <a href="{{ route('backend.baseinfos.create', 'patient'.'='.$patient->id) }}" class="btn btn-primary btn-sm"> 添加记录</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>随访次数</th>
                        <th>基本信息</th>
                        <th>流行病学调查</th>
                        <th>临床表现</th>
                        <th>检查结果</th>
                        <th>删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($baseinfos as $key=>$baseinfo)
                    <tr>
                        <td>
                            {!! $baseinfo->times == 1 ? "初始登记": "第".($baseinfo->times - 1)."次随访" !!}
                        </td>
                        <td>
                            @if(isset($baseinfo))
                                <a href="{{ route('backend.baseinfos.edit', $baseinfo->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                            @else
                                <a href="{{ route('backend.baseinfos.create', 'patient'.'='.$patient->id ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(isset($epibios[$key]) && $epibios[$key]->baseinfo_id == $baseinfo->id)
                                <a href="{{ route('backend.epibios.edit', $epibios[$key]->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                            @else
                                <a href="{{ route('backend.epibios.create', 'ba'.'='.$baseinfo->id ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(isset($clinicals[$key]) && $clinicals[$key]->baseinfo_id == $baseinfo->id)
                                <a href="{{ route('backend.clinicals.edit', $clinicals[$key]->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                            @else
                                <a href="{{ route('backend.clinicals.create', 'ba'.'='.$baseinfo->id ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(isset($results[$key]) && $results[$key]->baseinfo_id == $baseinfo->id)
                                <a href="{{ route('backend.results.edit', $results[$key]->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                            @else
                                <a href="{{ route('backend.results.create', 'ba'.'='.$baseinfo->id ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(isset($baseinfo))
                                <a href="{{ route('backend.baseinfos.confirm', $baseinfo->id ) }}"><span class="btn btn-danger btn-sm btn-bitbucket"><i class="fa fa-times"></i></span></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@stop