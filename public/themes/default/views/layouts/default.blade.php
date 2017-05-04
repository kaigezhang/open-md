<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="{{ theme('/css/bootstrap.min.css?v=3.3.5') }}" rel="stylesheet">
    <link href="{{ theme('/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ theme('/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ theme('/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ theme('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ theme('/css/style.min.css?v=4.0.0') }}" rel="stylesheet">

</head>


<body class="gray-bg top-navigation">
    <div class="wrapper">
        <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="#" class="navbar-brand">OPMD</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a aria-expanded="false" role="button" href="/"> 返回首页</a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 病例管理 <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="{{ route('backend.patients.index' )}}">所有病例</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 用户管理 <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="{{ route('backend.users.index' )}}">所有用户</a>
                                    </li>
                                    <li><a href="{{ route('backend.roles.index' )}}">角色管理</a>
                                    </li>
                                    <li><a href="{{ route('backend.perms.index' )}}">权限管理</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="{{ route('auth.logout')}}">
                                    <i class="fa fa-sign-out"></i> 退出
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="container">
            <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <h4>复诊</h4>
                    <small>点击+可添加复诊次数</small>
                    <p></p>
                    <p><a href="#" class="btn btn-primary" role="button">
                        <span class="fa fa-plus"></span>
                    </a>
                    </p>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>信息登记</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_wizard.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_wizard.html#">选项1</a>
                                </li>
                                <li><a href="form_wizard.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @yield('content')
                        <!-- <form id="form" action="form_wizard.html#" class="wizard-big">
                            <h1>账户</h1>
                            <fieldset>
                                <h2>账户信息</h2>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>用户名 *</label>
                                            <input id="userName" name="userName" type="text" class="form-control required">
                                        </div>
                                        <div class="form-group">
                                            <label>密码 *</label>
                                            <input id="password" name="password" type="text" class="form-control required">
                                        </div>
                                        <div class="form-group">
                                            <label>确认密码 *</label>
                                            <input id="confirm" name="confirm" type="text" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center">
                                            <div style="margin-top: 20px">
                                                <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <h1>个人资料</h1>
                            <fieldset>
                                <h2>个人资料信息</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>姓名 *</label>
                                            <input id="name" name="name" type="text" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input id="email" name="email" type="text" class="form-control required email">
                                        </div>
                                        <div class="form-group">
                                            <label>地址 *</label>
                                            <input id="address" name="address" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h1>警告</h1>
                            <fieldset>
                                <div class="text-center" style="margin-top: 120px">
                                    <h2>你是火星人 :-)</h2>
                                </div>
                            </fieldset>

                            <h1>完成</h1>
                            <fieldset>
                                <h2>条款</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                <label for="acceptTerms">我同意注册条款</label>
                            </fieldset>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </div>
    </div>
    

    <script src={{ theme('js/jquery.min.js?v=2.1.4') }}></script>
    <script src={{ theme('js/bootstrap.min.js?v=3.3.5') }}></script>
    <script src={{ theme('js/content.min.js?v=1.0.0') }}></script>
    <script src={{ theme('js/plugins/staps/jquery.steps.min.js') }}></script>
    <script src={{ theme('js/plugins/validate/jquery.validate.min.js') }}></script>
    <script src={{ theme('js/plugins/validate/messages_zh.min.js') }}></script>


    <script>
        // $("#example-embed").steps({ headerTag: "h3", bodyTag: "section", transitionEffect: "fade" });
        // $(document).ready(function(){$("#wizard").steps();$("#form").steps({bodyTag:"fieldset",onStepChanging:function(event,currentIndex,newIndex){if(currentIndex>newIndex){return true}if(newIndex===3&&Number($("#age").val())<18){return false}var form=$(this);if(currentIndex<newIndex){$(".body:eq("+newIndex+") label.error",form).remove();$(".body:eq("+newIndex+") .error",form).removeClass("error")}form.validate().settings.ignore=":disabled,:hidden";return form.valid()},onStepChanged:function(event,currentIndex,priorIndex){if(currentIndex===2&&Number($("#age").val())>=18){$(this).steps("next")}if(currentIndex===2&&priorIndex===3){$(this).steps("previous")}},onFinishing:function(event,currentIndex){var form=$(this);form.validate().settings.ignore=":disabled";return form.valid()},onFinished:function(event,currentIndex){var form=$(this);form.submit()}}).validate({errorPlacement:function(error,element){element.before(error)},rules:{confirm:{equalTo:"#password"}}})});
        // $(document).ready(function(){$("#example-embed").steps({ headerTag: "h3", bodyTag: "section", transitionEffect: "fade" })};
        $("#example-embed").steps({ headerTag: "h3", bodyTag: "section", transitionEffect: "fade" });
    </script>
</body>

</html>