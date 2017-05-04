<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="font-normal text-danger">OLK临床表现</label>
            <div class="well">
                
                   <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>部位</th>
                                            <th>是否癌变</th>
                                            <th>编辑</th>
                                            <th>删除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($olks as $olk)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('backend.olks.edit', $olk->id ) }}">
                                                        {{ $olk->site }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $olk->cancer }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.olks.edit', $olk->id ) }}">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.olks.confirm', $olk->id ) }}">
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

                <a href="{{ route('backend.olks.create', 'cl'.'='.$clinical->id ) }}">
                    <span class="btn btn-success">
                        <i class="fa fa-plus">&nbsp;&nbsp;添加该病人OLK临床表现信息</i>
                    </span>
                </a>
                <hr>
            </div>
        </div>
    </div>
</div>

