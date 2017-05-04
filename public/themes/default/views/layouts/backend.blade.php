<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="{{ theme('/css/bootstrap.min.css?v=3.3.5') }}" rel="stylesheet">
    <link href="{{ theme('/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ theme('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ theme('/css/style.min.css?v=4.0.0') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme('/js/plugins/colorbox/example2/colorbox.css') }}">
    @yield('style')

</head>

<body class="gray-bg top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="{{ route('backend.dashboard' ) }}" class="navbar-brand">OPMD</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">

			@role('admin')

				<li><a arial-expanded="false" role="button" href="/filemanager/index.html">图片管理</a></li>i
			@endrole
                      
                            @role('admin | doctor')
                                <li>
                                    <a aria-expanded="false" role="button" href="{{ route('backend.patients.index' )}}"> 病例管理</a>
                                </li>
                                <li>
                                    <a aria-expanded="false" role="button" href="{{ route('backend.users.edit', Auth::user()->id)}}"> 账户管理</a>
                                </li>
 
                            @endrole
                            {{--<li class="dropdown">--}}
                                {{--<a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 病例管理 <span class="caret"></span></a>--}}
                                {{--<ul role="menu" class="dropdown-menu">--}}
                                    {{--<li><a href="{{ route('backend.patients.index' )}}">所有病例</a>--}}
                                    {{--</li>--}}
                                    {{----}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            @role('admin')
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
                            @endrole

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
            <div class="wrapper wrapper-content">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-12">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <strong>出问题了</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>                           
                                </div>

                            @endif
                            @if($status)
                                <div class="alert alert-info">
                                    {{ $status }}
                                </div>

                            @endif
                            @yield('content')
                        </div>

                    </div>

                </div>

            </div>
            <div class="footer" style="bottom:0; position:fixed">
                <div>
                    <strong>Copyright</strong> OPMD &copy; 2016
                </div>
            </div>
        </div>
    </div>
    <script src={{ theme('js/jquery.min.js?v=2.1.4') }}></script>
    <script src={{ theme('js/bootstrap.min.js?v=3.3.5') }}></script>
    <script src={{ theme('js/plugins/chartJs/Chart.min.js') }}></script>
    <script src={{ theme('js/plugins/peity/jquery.peity.min.js') }}></script>
    <script src={{ theme('js/demo/peity-demo.min.js') }}></script>
    <script src={{ theme('js/plugins/validate/jquery.validate.min.js') }}></script>
    <script src={{ theme('js/plugins/validate/messages_zh.min.js') }}></script>
    <script src={{ theme('js/demo/form-validate-demo.min.js') }}></script>
    @yield('script')
</body>

</html>
