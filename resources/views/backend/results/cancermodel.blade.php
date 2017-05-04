<div id="cancerModel" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 b-r">
                        <h3 class="m-t-none m-b">癌变部位</h3>

                        <p>最具癌变潜能部位</p>

                        {!! Form::open([

                            'method' => 'post',
                            'route' => ['backend.cancers.store', 'id'.'='.$result->id]

                        ]) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('部位') !!}
                                    {!! Form::text('part', null, ['class' => 'form-control', 'required' => '']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请详细填写具体部位</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Velscope') !!}
                                    {!! Form::select('velscope', [
                                                    '' => '',
                                                    '1' => '+',
                                                    '2' => '-',
                                                    '3' => '±',
                                                ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('Velscope 图片') !!}
                                    {!! Form::input('hidden', 'velscope_img', null, ['id'=>'tupian1','class' => 'form-control']) !!}
                                    <br><a id="browse_server1" href="/filemanager/index.html?field_name=tupian1"><img class="tupian1-preview img-preview-sm" src=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('甲苯胺蓝染色') !!}
                                    {!! Form::select('toluidine', [
                                                    '' => '',
                                                    '1' => '+',
                                                    '2' => '-',
                                                    '3' => '±',
                                                ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('甲苯胺蓝染色图片') !!}
                                    {!! Form::input('hidden', 'toluidine_img', null, ['id'=>'tupian2','class' => 'form-control']) !!}
                                    <br><a id="browse_server2" href="/filemanager/index.html?field_name=tupian2"><img class="tupian2-preview img-preview-sm" src=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('组织病理结果') !!}
                                    {!! Form::select('biospy', [
                                                    '' => '',
                                                    '1' => '无',
                                                    '2' => '轻',
                                                    '3' => '中',
                                                    '4' => '重',
                                                    '5' => '癌',
                                                    '6' => '其它',
                                                ], null, ['class' => 'form-control']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>异常增生程度</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('组织病理结果图片') !!}
                                    {!! Form::input('hidden', 'biospy_img', null, ['id'=>'tupian3','class' => 'form-control']) !!}
                                    <br><a id="browse_server3" href="/filemanager/index.html?field_name=tupian3"><img class="tupian3-preview img-preview-sm" src=""></a>
                                </div>
                            </div>
                        </div>
                        {!! Form::submit( '创建新癌变部位信息', ['class' => 'btn btn-primary']) !!}       
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                   