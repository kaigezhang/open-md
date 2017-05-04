@extends('layouts.backend')


@section('title', '角色管理')


@section('content')


<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>所有角色</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
            <a href="{{ route('backend.roles.create') }}" class="btn btn-primary btn-sm"> 创建新角色</a>
                
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>名称</th>
                        <th>标记</th>
                        <th>描述</th>
                        <th>层级</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>
                            <a href="{{ route('backend.roles.edit', $role->id ) }}"> {{ $role->name }}</a>
                        </td>
                        <td>
                            {{ $role->slug }}
                        </td>
                        <td>
                            {{ $role->description }}
                        </td>
                        <td>
                            {{ $role->level }}
                        </td>
                        <td>
                            <a href="{{ route('backend.roles.edit', $role->id ) }}">
                                <span class="fa fa-edit"></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('backend.roles.confirm', $role->id ) }}">
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