<!doctype html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>后台管理登录</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset('X-admin/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('X-admin/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('X-admin/css/xadmin.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('layui/layui.all.js')}}" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-bg">

    <div class="login">
        <div class="message">后台管理登录</div>
        <div id="darkbannerwrap"></div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ url('/admin/doLogin') }}" class="layui-form">
            @csrf
            <input name="username" placeholder="用户名" type="text" lay-verify="username" lay-verType="tips" class="layui-input">
            <hr class="hr15">
            <input name="password" lay-verify="password" placeholder="密码" type="password" lay-verType="tips" class="layui-input">
            <hr class="hr15">
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input name="captcha" lay-verify="captcha" placeholder="验证码" lay-verType="tips" type="text" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <label class="layui-form-label">
                        <img src="{{ captcha_src() }}" onclick="this.src = '{{ captcha_src() }}' + Math.random()">
                    </label>
                </div>
            </div>
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20">
        </form>
    </div>

    <script>
        $(() => {
            // var form = layui.form;
            // form.verify({
            //     username: (value, item) => { //value：表单的值、item：表单的DOM对象
            //         if (value == '') {
            //             return '请输入用户名';
            //         }
            //         if (!/^[a-zA-Z_]{1}[\w]{3,15}$/.test(value)) {
            //             return '用户名不合法（只能为4-16位的字母、数字、下划线的组合，且不能以数字开头）';
            //         }
            //     },
            //     password: (value, item) => {
            //         if (value == '') {
            //             return '请输入密码';
            //         }
            //         if (!/^[\w]{6,18}$/.test(value)) {
            //             return '密码不合法（只能为6-18位的字母、数字、下划线的组合）';
            //         }
            //     },
            //     captcha: (value, item) => {
            //         if (value == '') {
            //             return '请输入验证码';
            //         }
            //     }
            // });
            // form.on('submit(login)', function(data) {
            //     layer.tips('只想提示地精准些', '#captcha');
            // });
            $.ajax({
                url: '{{ url("/admin/doLogin") }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    username: $(input[name="username"]).val()
                }
            })
        })
    </script>
    <!-- 底部结束 -->
</body>

</html>