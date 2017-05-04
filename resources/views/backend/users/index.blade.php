@extends('layouts.backend')


@section('title', '用户管理')


@section('content')


<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>所有用户</h5>

    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
            <a href="{{ route('backend.users.create') }}" class="btn btn-primary btn-sm"> 创建新用户</a>
                
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" placeholder="搜索" class="input-sm form-control"> <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-primary">搜索</button> </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>邮箱</th>
                        <th>角色</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('backend.users.edit', $user->id ) }}"> {{ $user->name }}</a>
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('backend.users.edit', $user->id ) }}">
                                <span class="fa fa-edit"></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('backend.users.confirm', $user->id ) }}">
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

    {!! $users->render() !!}
@stop