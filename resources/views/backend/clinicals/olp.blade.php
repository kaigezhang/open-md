<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="font-normal text-danger">OLP临床表现</label>
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
                                        @foreach($olps as $olp)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('backend.olps.edit', $olp->id ) }}">
                                                        {{ $olp->site }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $olp->cancer }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.olps.edit', $olp->id ) }}">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.olps.confirm', $olp->id ) }}">
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

                <a href="{{ route('backend.olps.create', 'cl'.'='.$clinical->id ) }}">
                    <span class="btn btn-success">
                        <i class="fa fa-plus">&nbsp;&nbsp;添加该病人OLP临床表现信息</i>
                    </span>
                </a>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('糜烂面积') !!} <span>mm<SUP>2<SUP></span>

                            {!! Form::input('ml_area','email', null, ['id' => 'ml_area', 'class' => 'form-control']) !!}  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('OLP分型') !!}

                            {!! Form::select('olp_type', [
                                            '' => '',
                                            '1' => '斑纹型',
                                            '2' => '充血型',
                                            '3' => '糜烂型',
                                        ], null, ['class' => 'form-control']) !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

