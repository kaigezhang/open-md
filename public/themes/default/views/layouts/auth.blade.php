
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>@yield('title') &mdash;OPMD </title>
    <link href="{{ theme('/css/bootstrap.min.css?v=3.3.5') }}" rel="stylesheet">
    <link href="{{ theme('/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ theme('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ theme('/css/style.min.css?v=4.0.0') }}" rel="stylesheet">
    <!--[if lt IE 8]>
	<script>
       	alert('为了保证您的体验，本网站不支持IE8以及IE8以下版本，请使用IE9或以上版本，推荐更换成Chrome或者Firefox浏览器');
    	</script>
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name text-center">OPMD</h3>

            </div>
            <h3>@yield('heading')</h3>
            @yield('content')

            
        </div>
    </div>
     <script src={{ theme('js/jquery.min.js?v=2.1.4') }}></script>
    <script src={{ theme('js/bootstrap.min.js?v=3.3.5') }}></script>
</body>

</html>
