<!-- /.Footer Nav Wrap -->
<script type="text/javascript" src="{{asset('home/js/zh-cn-tw.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/comments-ajax.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/ajax-sign-script.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/prettify.js')}}"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    var ajax_sign_object = {
        "redirecturl": "http:\/\/www.iydu.net\/",
        "ajaxurl": "http:\/\/www.iydu.net\/wp-admin\/admin-ajax.php",
        "loadingmessage": "\u6b63\u5728\u8bf7\u6c42\u4e2d\uff0c\u8bf7\u7a0d\u7b49..."
    };
    /* ]]> */
</script>
<script src="{{asset('home/js/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript">
    var defaultEncoding = 0;
    var translateDelay = 100;
    var cookieDomain = "http://www.iydu.net";
</script>
<!-- 百度分享 -->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=2"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    //在这里定义bds_config
    var bds_config = {
        'snsKey': {
            'tsina': "2884429244",
            'tqq': "101166664"
        }
    };
    document.getElementById('bdshell_js').src =
        "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000);
</script>
<!-- 引入用户自定义代码 -->
<!-- 引入主题js -->

<script type="text/javascript" src="{{asset('home/js/theme.js?ver=4.3.6')}}"></script>
<!-- /.Footer -->
<script type="text/javascript">
    $('.site_loading').animate({
        'width': '100%'
    }, 50); //第五个节点
</script>