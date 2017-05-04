<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="font-noraml">目测最具癌变潜能部位</label>
            <div class="well">
                
                   <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>部位</th>
                                            <th>编辑</th>
                                            <th>删除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cancers as $cancer)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('backend.cancers.edit', $cancer->id ) }}">
                                                        {{ $cancer->part }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.cancers.edit', $cancer->id ) }}">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.cancers.confirm', $cancer->id ) }}">
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

                <a href="{{ route('backend.cancers.create', 're'.'='.$result->id ) }}">
                    <span class="btn btn-success">
                        <i class="fa fa-plus">&nbsp;&nbsp;添加癌变部位信息</i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

