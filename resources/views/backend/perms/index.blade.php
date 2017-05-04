@extends('layouts.backend')


@section('title', '权限管理')


@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>所有权限</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
            <a href="{{ route('backend.perms.create') }}" class="btn btn-primary btn-sm"> 创建新权限</a>               
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>名称</th>
                        <th>标记</th>
                        <th>描述</th>
                        <th>模式</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perms as $perm)
                    <tr>
                        <td>
                            <a href="{{ route('backend.perms.edit', $perm->id ) }}"> {{ $perm->name }}</a>
                        </td>
                        <td>
                            {{ $perm->slug }}
                        </td>
                        <td>
                            {{ $perm->description }}
                        </td>
                        <td>
                            {{ $perm->model }}
                        </td>
                        <td>
                            <a href="{{ route('backend.perms.edit', $perm->id ) }}">
                                <span class="fa fa-edit"></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('backend.perms.confirm', $perm->id ) }}">
                                <span class="fa fa-remove"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@stop