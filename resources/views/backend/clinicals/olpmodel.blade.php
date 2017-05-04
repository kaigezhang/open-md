<div id="olpModel" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 b-r">
                        <h3 class="m-t-none m-b">OLP</h3>

                        <p>病人OLP临床表现信息</p>

                        {!! Form::open([

                            'method' => 'post',
                            'route' => ['backend.olps.store', 'id'.'='.$clinical->id]

                        ]) !!}
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('部位') !!}
                                    {!! Form::select('site', [
                                            '' => '',
                                            '1' => '双唇',
                                            '2' => '右颊',
                                            '3' => '左颊',
                                            '4' => '舌背',
                                            '5' => '舌腹',
                                            '6' => '口底',
                                            '7' => '硬腭',
                                            '8' => '软腭',
                                            '9' => '上颌牙龈',
                                            '10' => '下颌牙龈'

                                        ], null, ['class' => 'form-control', 'required' => '']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('白纹累计（四分法）') !!}
                                    {!! Form::select('bw', [
                                            '' => '',
                                            '1' => '1/4',
                                            '2' => '2/4',
                                            '3' => '3/4',
                                            '4' => '4/4'

                                        ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('充血面积（四分法）') !!}
                                    {!! Form::select('cx', [
                                            '' => '',
                                            '1' => '1/4',
                                            '2' => '2/4',
                                            '3' => '3/4',
                                            '4' => '4/4'
                                        ], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {!! Form::label('糜烂长') !!}
                                    {!! Form::input('number', 'ml_long', null, ['class' => 'form-control', 'placeholder' => 'mm']) !!}
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>最长径</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                {!! Form::label('糜烂宽') !!}
                                {!! Form::input('number','ml_wide', null, ['class' => 'form-control', 'placeholder' => 'mm']) !!}
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i>与最长径垂直的最长径</span>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('部位图片') !!}
                                    {!! Form::input('hidden','site_img', null, ['id' => 'tupian', 'class' => 'form-control']) !!}
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