<div id="olkModel" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 b-r">
                        <h3 class="m-t-none m-b">OLK</h3>

                        <p>病人OLK临床表现信息</p>

                        {!! Form::open([

                            'method' => 'post',
                            'route' => ['backend.olks.store', 'id'.'='.$clinical->id]

                        ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('部位') !!}
                                    {!! Form::text('site', null, ['class' => 'form-control', 'required' => '']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>请详细填写具体部位</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('分型') !!}
                                    {!! Form::select('type', [
                                            '' => '',
                                            'A' => '板块状',
                                            'B' => '皱纸状',
                                            'C' => '颗粒状',
                                            'D' => '疣状',
                                            'E' => '溃疡状'

                                        ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {!! Form::label('长') !!}
                                    {!! Form::input('number', 'site_long', null, ['class' => 'form-control', 'placeholder' => 'mm', 'required' => '' ]) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>最长径</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                {!! Form::label('宽') !!}
                                {!! Form::input('number','site_wide', null, ['class' => 'form-control', 'placeholder' => 'mm', 'required' => '']) !!}
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>与最长径垂直的最长径</span>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('部位图片') !!}
                                    {!! Form::input('hidden', 'site_img', null, ['id' => 'tupian', 'class' => 'form-control']) !!}
                                    <br><a id="browse_server" href="/filemanager/index.html?field_name=tupian"><img class="tupian-preview img-preview-sm" src=""></a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('是否癌变') !!}<br>
                                    {!! Form::radio('cancer', 0 , null, ['class' => 'radio i-checks']) !!}否&nbsp;&nbsp;
                                    {!! Form::radio('cancer', 1 , null, ['class' => 'radio i-checks']) !!}是&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                        {!! Form::submit( '创建新OLP信息', ['class' => 'btn btn-primary']) !!}       
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                   