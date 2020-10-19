<header class="header-wrap" id="nav-scroll">
    <div class="nav-wrap">
        <div class="logo-title">
            <a href="#" alt="未来博客" title="未来博客"> 未来博客 </a>
        </div>
        <!-- Toggle menu -->
        <div class="toggle-menu">
            <i class="fa fa-bars"></i>
        </div>
        <!-- /.Toggle menu -->
        <!-- Search button -->
        <div class="search-btn-click">
            <i class="fa fa-search"></i>
            <div class="header-search-slide">
                <form method="get" id="searchform-slide" class="searchform" action="#" role="search">
                    <input type="search" class="field" name="s" value="" placeholder="Search" required="" />
                </form>
            </div>
        </div>
        <!-- /.Search button -->
        <!-- Login status -->
        <div id="login-reg">
            <span data-sign="0" id="user-login" class="user-login ie_pie only-login"> 登录</span>
        </div>
        <!-- /.Login status -->
        <!-- Focus us -->
        <div id="focus-us">
            关注我们
            <div id="focus-slide" class="ie_pie">
                <div class="focus-title">
                    关注我们
                </div>
                <p class="focus-content"> <a href="http://weibo.com/iydu" target="_blank" class="sinaweibo"><span><i class="fa fa-weibo"></i>新浪微博</span></a> <a href="http://t.qq.com/iydu_net" target="_blank" class="sinaweibo"><span><i class="fa fa-tencent-weibo"></i>腾讯微博</span></a>
                </p>
                <div class="focus-title">
                    联系我们
                </div>
                <p class="focus-content" style="line-height: 20px;margin-bottom: 10px;"> <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=55002834&amp;site=qq&amp;menu=yes" target="_blank" class="qq"><span><i class="fa fa-qq"></i>QQ</span></a> <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&amp;email=RnNzdnZ0fnVyBjc3aCUpKw" target="_blank"><span><i class="fa fa-envelope"></i>发送邮件</span></a>
                    <!-- 可删除 --> <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=5be294c49da03845dbea3c774294f7da4c2cc682cf43f98c543118c1193403f6"><i class="fa fa-users">&nbsp;&nbsp;</i>加入QQ群</a>
                    <!-- 删除截止 -->
                </p>
                <div class="focus-title">
                    订阅本站
                    <i class="fa fa-rss"></i>
                </div>
                <p class="focus-content"> <input type="text" name="rss" class="rss" value="http://www.iydu.net/feed" />
                </p>
                <p class="focus-content">订阅到： <a rel="external nofollow" target="_blank" href="http://xianguo.com/subscribe?url=http://www.iydu.net/feed">鲜果</a>
                    <a rel="external nofollow" target="_blank" href="http://reader.youdao.com/b.do?keyfrom=bookmarklet&amp;url=http://www.iydu.net/feed">有道</a>
                    <a rel="external nofollow" target="_blank" href="http://feedly.com/index.html#subscription%2Ffeed%2Fhttp://www.iydu.net/feed">Feedly</a></p>
                <form action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post">
                    <input type="hidden" name="t" value="qf_booked_feedback" />
                    <input type="hidden" name="id" value="http://list.qq.com/cgi-bin/qf_invite?id=a14dea03f30a87ef45020939d38f0a063282dd05c2349cc2" />
                    <input type="email" name="to" id="to" class="focus-email" placeholder="输入邮箱,订阅本站" required="" />
                    <input type="submit" class="focus-email-submit" value="订阅" />
                </form>
            </div>
        </div>
        <!-- /.Focus us -->
        <!-- Menu Items Begin -->
        <nav id="primary-navigation" class="site-navigation primary-navigation " role="navigation">
            <div class="menu-%e9%a1%b6%e9%83%a8%e8%8f%9c%e5%8d%95-container">
                <ul id="menu-%e9%a1%b6%e9%83%a8%e8%8f%9c%e5%8d%95" class="nav-menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="http://www.iydu.net">首页</a></li>
                    @foreach ($top_categories as $top_category)
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category 
                            @if(!$top_category->isLeaf())
                                menu-item-has-children
                            @endif
                        ">
                            <a href="#">{{$top_category->name}}</a>
                                @if(!$top_category->isLeaf())
                                    <ul class="sub-menu">
                                        @foreach ($top_category->getImmediateDescendants() as $category)
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                                <a href="#">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                        </li>
                    @endforeach
                    <!-- <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-4316"><a href="http://www.iydu.net/deepreading">深阅读</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4317"><a href="lists.html?talk">七嘴八舌</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4320"><a href="lists.html?prose">心灵花园</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4318"><a href="lists.html?history">史海拾贝</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4321"><a href="lists.html?read">读书书语</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4322"><a href="lists.html?science">鲜活科学</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4421"><a target="_blank" href="http://btmovie.net/category/appreciation">光影赏析</a></li>
                        </ul>
                    
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-4305"><a href="http://www.iydu.net/shallowreading">浅阅读</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4314"><a href="http://www.iydu.net/shallowreading/vision">新视野</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4315"><a href="http://www.iydu.net/shallowreading/phenomena">浮世绘</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4302"><a href="http://www.iydu.net/series">强文连载</a></li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-4304"><a href="http://www.iydu.net/interest">有料</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4311"><a href="http://www.iydu.net/interest/encouragement">能量加油站</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-4310"><a href="http://www.iydu.net/interest/humorous">冷笑话精选</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5019"><a target="_blank" href="http://qianshao.iydu.net">钱哨</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5018"><a href="http://www.iydu.net/liuyan">留言簿</a></li> -->
                </ul>
            </div>
        </nav>
        <!-- Menu Items End -->
    </div>
    <div class="clr"></div>
    <div class="site_loading"></div>
</header>
<div class="hidefixnav"></div>
<!-- End Nav -->
<script type="text/javascript">
    $('.site_loading').animate({
        'width': '33%'
    }, 50); //第一个进度节点
</script>