<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入页面描述和关键字模板 -->
    <title>@yield('title')</title>
    <meta name="description" content="未来博客专注于提供多元化的阅读体验，以阅读提升生活品质" />
    <meta name="keywords" content="未来博客,博客,文字,历史,杂谈,散文,见闻,游记,人文,科技,杂碎,冷笑话,段子,语录" />
    <!-- 网站图标 -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- 禁止浏览器初始缩放 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    @include('home.public.style')
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    @include('home.public.script')
</head>

<body id="wrap" class="home blog">
    <div id="body-container">
        <!-- Moblie nav-->
        @include('home.public.mobile-nav')
        <!-- /.Moblie nav -->
        <section id="content-container" style="background:#f1f4f9; ">
            @include('home.public.header')
            <!-- Main Wrap -->
            @section('main-wrap')
                <!-- 右侧标栏 -->
                @include('home.public.aside')
                <!-- 右侧标栏 结束 -->
            @show
            <!--/.Main Wrap -->
            <!-- Bottom Banner -->
            <div style="height:20px;"></div>
            <!-- /.Bottom Banner -->
            @include('home.public.footer')
        </section>
    </div>
    <!-- 登录 -->
    @include('home.public.sign')
    <!-- 登录 结束 -->
    <div class="floatbtn">
        <!-- Comment -->
        <!-- /.Comment -->
        <!-- Share -->
        <span id="bdshare" class="bdshare_t mobile-hide"><a class="bds_more" href="#" data-cmd="more"><i class="fa fa-share-alt"></i></a></span>
        <!-- /.Share -->
        <!-- QR -->
        <span id="qr" class="mobile-hide"><i class="fa fa-qrcode"></i>
            <div id="floatbtn-qr">
                <div id="floatbtn-qr-msg">
                    扫一扫二维码分享
                </div>
            </div>
        </span>
        <!-- /.QR -->
        <!-- Simplified or Traditional -->
        <span id="zh-cn-tw" class="mobile-hide"><i><a id="StranLink">繁</a></i></span>
        <!-- /.Simplified or Traditional -->
        <!-- Layout Switch -->
        <span id="layoutswt" class="mobile-hide"> <i class="fa fa-th-large is_cms" src="http://www.iydu.net"></i>
        </span>
        <!-- /.Layout Switch -->
        <!-- Back to Home -->
        <!-- /.Back to Home -->
        <!-- Scroll Top -->
        <span id="back-to-top"><i class="fa fa-arrow-up"></i></span>
        <!-- /.Scroll Top -->
    </div>
    @include('home.public.footer-js')
</body>

</html>