
<div id="olkModel" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 b-r">
                        <h3 class="m-t-none m-b">OLK</h3>

                        <p>欢迎登录本站(⊙o⊙)</p>

                        <form role="form">
                            <div class="form-group">
                                <label>用户名：</label>
                                <input type="email" placeholder="请输入用户名" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>密码：</label>
                                <input type="password" placeholder="请输入密码" class="form-control">
                            </div>
                            <div>
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>登录</strong>
                                </button>
                                <label>
                                    <input type="checkbox" class="i-checks">自动登录</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <h4>还不是会员？</h4>
                        <p>您可以注册一个账户</p>
                        <p class="text-center">
                            <a href="form_basic.html"><i class="fa fa-sign-in big-icon"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<td>
                           @if(isset($clinicals[$key]) && $clinicals[$key]->times == $baseinfo->times)
                                <a href="{{ route('backend.clinicals.edit', $clinicals[$key]->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                                <a href="{{ route('backend.clinicals.confirm', $clinicals[$key]->id ) }}"><span class="btn btn-danger btn-sm btn-bitbucket"><i class="fa fa-times"></i></span></a>
                            @else
                                <a href="{{ route('backend.clinicals.create', 'patient'.'='.$patient->id.'&'.'times'.'='.$baseinfo->times ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>   
                            @endif
                        </td>
                        <td>
                           @if(isset($results[$key]) && $results[$key]->times == $baseinfo->times)
                                <a href="{{ route('backend.results.edit', $results[$key]->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                                <a href="{{ route('backend.results.confirm', $results[$key]->id ) }}"><span class="btn btn-danger btn-sm btn-bitbucket"><i class="fa fa-times"></i></span></a>
                            @else
                                <a href="{{ route('backend.results.create', 'patient'.'='.$patient->id.'&'.'times'.'='.$baseinfo->times ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>   
                            @endif
                        </td>


                        @if($epibios->isEmpty())
                                <a href="{{ route('backend.epibios.create', 'patient'.'='.$patient->id.'&'.'times'.'='.$baseinfo->times ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus">hehe</i></span></a>
                            @else


                            @if($epibios->isEmpty())
                                <a href="{{ route('backend.epibios.create', 'patient'.'='.$patient->id.'&'.'times'.'='.$baseinfo->times ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus">hehe</i></span></a>
                            @else
                                @foreach($epibios as $epibio)
                                    @if($epibio->times == $baseinfo->times)
                                        <a href="{{ route('backend.epibios.edit', $epibio->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                                        <a href="{{ route('backend.epibios.confirm', $epibio->id ) }}"><span class="btn btn-danger btn-sm btn-bitbucket"><i class="fa fa-times"></i></span></a>
                                    @endif
                                @endforeach
                            @else
                                <a href="{{ route('backend.epibios.create', 'patient'.'='.$patient->id.'&'.'times'.'='.$baseinfo->times ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus">xixi</i></span></a>
                            @endif


                            @foreach($epibios as $epibio)
                                @if($epibio->times == $baseinfo->times)
                                    <a href="{{ route('backend.epibios.edit', $epibio->id ) }}"><span class="btn btn-primary btn-sm btn-bitbucket"><i class=" fa fa-edit"></i></span></a>
                                    <a href="{{ route('backend.epibios.confirm', $epibio->id ) }}"><span class="btn btn-danger btn-sm btn-bitbucket"><i class="fa fa-times"></i></span></a>    
                                @elseif(isset($epibio->times) == null)
                                     <a href="{{ route('backend.epibios.create', 'patient'.'='.$patient->id.'&'.'times'.'='.$baseinfo->times ) }}"><span class="btn btn-success btn-sm btn-bitbucket"><i class="fa fa-plus"></i></span></a>
                                @endif
                            @endforeach