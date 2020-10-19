@extends('home.layout.home')
@section('title', '未来博客 - 首页')
@section('main-wrap')
<div id="main-wrap">
    <div id="sitenews-wrap" class="container"></div>
    <!-- Header Banner -->
    <!-- /.Header Banner -->
    <!-- CMS Layout -->
    <div class="container two-col-container cms-with-sidebar">
        <div id="main-wrap-left">
            <!-- Stickys -->
            <!-- /.Stickys -->
            @foreach($category_articles as $category_article)
            <section class="catlist clr">
                <div class="catlist-container clr">
                    <h2 class="home-heading clr"> <span class="heading-text"> {{$category_article->name}} </span> <a href="lists.html?talk">+ 更多</a></h2>
                    @if (!empty($category_article->article))
                    @foreach($category_article->article as $article)
                    @if ($article->isRecommend)
                    <span class="col-left catlist-style2">
                        <article class="home-blog-entry clr">
                            <a href="#" title="{{$article->title}}" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://{{env('QINIU_DOMAIN')}}/{{$article->thumb}}" alt="{{$article->title}}" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="#" title="{{$article->title}}">{{$article->title}}</a></h3>
                            <div class="postlist-meta">
                                <span class="postlist-meta-time">{{$article->created_at}}</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-views">3&nbsp;℃</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="#">0</a></span>
                                <div class="postlist-meta-like like-btn" style="float:right;" pid="5148" title="点击喜欢">
                                    <i class="fa fa-heart"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                                <div class="postlist-meta-collect collect collect-no" uid="16" article_id="{{$article->id}}" style="float:right;cursor:default;" title="必须登录才能收藏">
                                    <i class="fa fa-star"></i>&nbsp;
                                    <span>{{$article->collect}}</span>&nbsp;
                                </div>
                            </div>
                            <p> {{$article->desc}}<a rel="nofollow" class="more-link" style="text-decoration:none;" href="#"></a> </p>
                        </article>
                    </span>
                    @endif
                    @endforeach
                    @endif
                    <span class="col-right catlist-style2">
                        @if (!empty($category_article->article))
                        @foreach($category_article->article as $key => $article)
                        @if (!$article->isRecommend && $key <= 5)
                        <article class="clr col-small">
                            <a href="#" title="{{$article->title}}" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://{{env('QINIU_DOMAIN')}}/{{$article->thumb}}" alt="{{$article->title}}" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="#" title="{{$article->title}}">{{$article->title}}</a></h3>
                            <p>
                                {{$article->desc}}<a rel="nofollow" class="more-link" style="text-decoration:none;" href="#"></a>
                            </p>
                        </article>
                        @endif
                        @endforeach
                        @endif
                    </span>
                </div>
            </section>
            @endforeach
            <div id="loopad" class="container">
            </div>































            <!-- <section class="catlist-8 catlist clr">
                <div class="catlist-container clr">
                    <h2 class="home-heading clr"> <span class="heading-text"> 心灵花园 </span> <a href="lists.html?prose">+
                            更多</a> </h2>
                    <span class="col-left catlist-style2">
                        <article class="home-blog-entry clr">
                            <a href="http://www.iydu.net/5151.html" title="当机会到来之时，你有把握抓住它吗？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/2.jpg?imageView2/1/w/375/h/250/q/100" alt="当机会到来之时，你有把握抓住它吗？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5151.html" title="当机会到来之时，你有把握抓住它吗？">当机会到来之时，你有把握抓住它吗？</a></h3>
                            <div class="postlist-meta">
                                <span class="postlist-meta-time">2016-09-28</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-views">4&nbsp;℃</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="http://www.iydu.net/5151.html#comments">0</a></span>
                                <div class="postlist-meta-like like-btn" style="float:right;" pid="5151" title="点击喜欢">
                                    <i class="fa fa-heart"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                                <div class="postlist-meta-collect collect collect-no" style="float:right;cursor:default;" title="必须登录才能收藏">
                                    <i class="fa fa-star"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                            </div>
                            <p> 人的一生是否都是偶然？ 知名演员葛优曾经说过这样一段话：
                                人的一生都是偶然。演《霸王别姬》我没得奖，演完《活着》，天时地利人和都该我得了，就得了。如果当时有什么别的戏出彩，也就没我了。
                                葛优将他的人生归结于偶然，再看下面这些耳熟能详的句子，你是否也认同了人的一生都是偶然呢？ 踏破铁鞋无觅处，得来全不费功夫。
                                着意种花花不活，无心栽柳柳成阴。 众里寻他千百度，蓦然回首，那人却在灯火阑珊处。 但是，人<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5151.html"></a>
                            </p>
                        </article>
                    </span>
                    <span class="col-right catlist-style2">
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5150.html" title="最好的关系，是我懂你的不容易" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/32.jpg?imageView2/1/w/375/h/250/q/100" alt="最好的关系，是我懂你的不容易" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5150.html" title="最好的关系，是我懂你的不容易">最好的关系，是我懂你的不容易</a></h3>
                            <p>
                                姐姐和姐夫结婚快二十年，感情很好，极少吵架，是亲戚里的好夫妻典范。大家说起他们来都会纳闷：这俩人，好像就不会生气似的。我以前也纳闷，不过现在懂了。
                                前几天住姐姐家，姐夫晚上十一点才回来，当时我们都睡了，但姐姐一听开门声，就立刻爬起来，说你姐夫醉得不轻。
                                我迷迷糊糊跟着出来，只见姐夫正扶着卫生间的门狂吐，马桶近在咫尺，但他全吐在了地砖上，溅得到处都是，姐姐轻拍着他的背，看他吐够了，接了杯温水让他漱口<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5150.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5147.html" title="穷养富养，都不如教养" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/37.jpg?imageView2/1/w/375/h/250/q/100" alt="穷养富养，都不如教养" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5147.html" title="穷养富养，都不如教养">穷养富养，都不如教养</a></h3>
                            <p> 初中的时候，隔壁班两个学生打架，老师通知双方家长。
                                在年级办公室里，有位家长一进来，直接指着自己的孩子破口大骂：要么别打，要打就打赢，打赢了多少钱我都赔，打输了以后别叫我。
                                这样一番言论，惊得办公室众老师哭笑不得。当时我们班主任也在场，回来便和我们讲起这件事情。
                                他说，对孩子而言，如果家庭教养跟不上学校教育，那么老师再努力也是徒劳。而且从某种程度上来说，他掌握的知识越多，对社会的潜在危害性也越大。<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5147.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5142.html" title="没有自制力的人，有什么资格谈努力？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/30.jpg?imageView2/1/w/375/h/250/q/100" alt="没有自制力的人，有什么资格谈努力？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5142.html" title="没有自制力的人，有什么资格谈努力？">没有自制力的人，有什么资格谈努力？</a></h3>
                            <p>
                                在微博上看到一段话“你可以追剧追一晚，只要你可以按时交上论文。你可以有丰富的夜生活，只要第二天你还能精神饱满的做好本职工作。放纵究竟是不是错，取决于你能不能为你的放纵负责。还是那句话，没有自制力的人不足以谈人生。”
                                简直一语戳中，微博下留言的人，无一不在哀嚎：膝盖中箭。
                                自制力并不是什么新鲜词，说白了就是能够自觉控制自己的行动和情绪，集中注意力去达成原定的目标，而不受其他事情干扰。 可是说起来容易<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5142.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5141.html" title="情商高就是心里装着别人" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/19.jpg?imageView2/1/w/375/h/250/q/100" alt="情商高就是心里装着别人" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5141.html" title="情商高就是心里装着别人">情商高就是心里装着别人</a></h3>
                            <p>
                                几个人在一个桌上吃饭，她是我带去的朋友，服务员把菜单给她，她要递给我，我说你先点，结果她噼里啪啦把一桌人的菜都点了。点完也没问我们行不行，菜上来，发现每个菜都辣，一个正在口腔溃疡的老兄吃得龇牙咧嘴。
                                回去的路上，她说小羊姐，我是不是情商低得没救了，怎么才能提高呢。我告诉她，情商高就是心里装着别人。 “真装吗？还是假装有就行了。”
                                “假装的早晚会被发现，高情商就变成了奸诈狡猾、阿谀奉承。” “那我可<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5141.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5116.html" title="你为什么穷？因为贫穷的细节太有趣" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/8.jpg?imageView2/1/w/375/h/250/q/100" alt="你为什么穷？因为贫穷的细节太有趣" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5116.html" title="你为什么穷？因为贫穷的细节太有趣">你为什么穷？因为贫穷的细节太有趣</a></h3>
                            <p>
                                很不幸的是，任何一种负面的生活，都能产生一些乱七八糟的细节，使它变得蛮有趣的；人就在这种趣味中沉沦下去，从根本上忘记了这种生活需要改进。——王小波
                                01 “贫穷是一种生活方式。”
                                这是国外一位研究发展的学者说的，我觉得挺有道理。可能很多人没有意识到，虽然人人都知道有钱的好处，也很想变成有钱人，但是他们最终止步不前，不是因为没能力改变，而是因为没有摆脱贫穷的强烈欲望。
                                为什么呢？很可能有些人，包括我<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5116.html"></a> </p>
                        </article>
                    </span>
                </div>
            </section>
            <section class="catlist-7 catlist clr">
                <div class="catlist-container clr">
                    <h2 class="home-heading clr"> <span class="heading-text"> 史海拾贝 </span> <a href="lists.html?history">+
                            更多</a> </h2>
                    <span class="col-left catlist-style2">
                        <article class="home-blog-entry clr">
                            <a href="http://www.iydu.net/5152.html" title="清朝其实是被一群股民推翻的" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/xjgp.png?imageView2/1/w/375/h/250/q/100" alt="清朝其实是被一群股民推翻的" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5152.html" title="清朝其实是被一群股民推翻的">清朝其实是被一群股民推翻的</a></h3>
                            <div class="postlist-meta">
                                <span class="postlist-meta-time">2016-09-28</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-views">16&nbsp;℃</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="http://www.iydu.net/5152.html#comments">0</a></span>
                                <div class="postlist-meta-like like-btn" style="float:right;" pid="5152" title="点击喜欢">
                                    <i class="fa fa-heart"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                                <div class="postlist-meta-collect collect collect-no" style="float:right;cursor:default;" title="必须登录才能收藏">
                                    <i class="fa fa-star"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                            </div>
                            <p> 地大物博的大清王朝是因为什么被推翻的？ 有人说是闭关锁国的封建统治；有人说是外国列强的资本冲击；有人说是内部政局的贪污腐败。
                                其实，大清是因为一场超级股灾，被一群股民推翻的。 事情是介个样子滴…
                                随着清王朝上层的“天朝上国”思想被两次鸦片战争打破之后，举国上下开始反思，进而产生了一种社会思维就是：“洋人有洋枪，洋人有大炮，洋人特别屌。”
                                大清国在机械、大炮方面都积极学习洋人，搞经济也不愿意落后，也<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5152.html"></a> </p>
                        </article>
                    </span>
                    <span class="col-right catlist-style2">
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5145.html" title="清代最好色文人——袁枚" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/yuanmei.png?imageView2/1/w/375/h/250/q/100" alt="清代最好色文人——袁枚" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5145.html" title="清代最好色文人——袁枚">清代最好色文人——袁枚</a></h3>
                            <p> 寒夜读书忘却眠， 锦衾香烬炉无烟。 美人含怒夺灯去， 问郎知是几更天。 ——袁枚《寒夜》 这是我读过的最有故事性和画面感，也是最有趣的诗了。
                                寒冬夜晚，一个书呆子秉烛夜读，忘记时间，忘记睡眠也就算了，最可恨的是忘记了锦衾下的娇妻。美人看郎君如此用功也不好催促，躺在床上等着，等着等着就睡着了，醒来发现枕边还没有人，抬头一看，香炉已经没有烟气了，而书呆子还在灯下读书，不由得怒从中来，起身夺了他的灯，“<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5145.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5138.html" title="为什么西方人拿火药造枪炮，而中国人造烟花" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/bianpao.png?imageView2/1/w/375/h/250/q/100" alt="为什么西方人拿火药造枪炮，而中国人造烟花" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5138.html" title="为什么西方人拿火药造枪炮，而中国人造烟花">为什么西方人拿火药造枪炮，而中国人造烟花</a></h3>
                            <p> 中国人使用火药比西方人“早几百年”，而西方人只花了一百多年就造出比中国厉害得多的火炮，是中国人特别热爱和平，还是西方人开挂了？
                                70多年前，鲁迅曾发表过一句感慨：“外国用火药制造子弹御敌，中国却用它做爆竹敬神。”
                                此后至今，每当人们讨论“国民性”、“屈辱的近代史”之类的话题，这句话都会反复出现，仿佛从东西方火药应用的差异入手，即可参透各文明发展不均等的天机。
                                然而，火药、枪炮与爆竹的历史不是像鲁迅<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5138.html"></a> </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5124.html" title="富有的武林" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/wulin.jpg?imageView2/1/w/375/h/250/q/100" alt="富有的武林" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5124.html" title="富有的武林">富有的武林</a></h3>
                            <p> 看武侠小说的朋友心里可能都有这么一个疑问：江湖中那些门派，哪里来的经济收入，居然可以养活那么多不事生产的闲人？ 这个问题曾引发网友的热烈讨论。
                                有人说，“少林武当还算有点儿香火钱，那五岳剑派啊、各类山庄啊，不会真的搞个旅游胜地搞创收吧？”
                                有人说，“除了杀人抢劫、收保护费之外，实在想不出来他们赚钱的第三种方法了。”
                                也有人说，“可以挖藏宝图啊，娶首富之女啊，开快活林啊，当杀手啊。” 说实话，看到这<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5124.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5117.html" title="刘备为何非要选刘禅继位？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/08/liushan.png?imageView2/1/w/375/h/250/q/100" alt="刘备为何非要选刘禅继位？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5117.html" title="刘备为何非要选刘禅继位？">刘备为何非要选刘禅继位？</a></h3>
                            <p> 在三国历史上，刘禅一直以来被大家热议。很多人会有一个疑问，刘备难道就刘禅一个儿子吗？非要选他继位？刘备确实不止一个儿子。历史记载，他有四子。
                                1、刘封：性格刚猛，气力过人。随赵云、张飞等扫荡西川，颇有战功，而后又统领孟达攻取上庸，深为刘备信任。但是后来关羽北伐曹魏，多次要求刘封起兵相助，刘封不从。而后又侵凌孟达，迫其降魏。孟达与魏徐晃共袭刘封，并劝刘封投降，刘封不降，又遭部下叛变，败归成都。刘备在<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5117.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5107.html" title="穷困潦倒的中国总理——段祺瑞" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/08/duanqirui.jpg?imageView2/1/w/375/h/250/q/100" alt="穷困潦倒的中国总理——段祺瑞" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5107.html" title="穷困潦倒的中国总理——段祺瑞">穷困潦倒的中国总理——段祺瑞</a></h3>
                            <p> 中国历史上有那么一位总理：不仅没有一分钱存款，还因为无法偿还债务被人告上了法院，他就是段祺瑞。
                                1881年，段祺瑞怀揣一块银元赤脚徒步行走数十天二千余里的路，来到山东威海学习军事。1888年冬，段祺瑞以第一名的成绩被获准与其它四位同学到德国留学，后德方看重他的才华将其独自留在埃森克虏伯兵工厂深造。半年后，段祺瑞学成准备归国，德方希望将他留下，他因希望报效祖国而毅然离去。回国后投入新军，后因表现出众<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5107.html"></a>
                            </p>
                        </article>
                    </span>
                </div>
            </section>
            <section class="catlist-11 catlist clr">
                <div class="catlist-container clr">
                    <h2 class="home-heading clr"> <span class="heading-text"> 读书书语 </span> <a href="lists.html?read">+
                            更多</a> </h2>
                    <span class="col-left catlist-style2">
                        <article class="home-blog-entry clr">
                            <a href="http://www.iydu.net/5156.html" title="有抵抗感的阅读才是严肃阅读" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/18.jpg?imageView2/1/w/375/h/250/q/100" alt="有抵抗感的阅读才是严肃阅读" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5156.html" title="有抵抗感的阅读才是严肃阅读">有抵抗感的阅读才是严肃阅读</a></h3>
                            <div class="postlist-meta">
                                <span class="postlist-meta-time">2016-09-30</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-views">4&nbsp;℃</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="http://www.iydu.net/5156.html#comments">0</a></span>
                                <div class="postlist-meta-like like-btn" style="float:right;" pid="5156" title="点击喜欢">
                                    <i class="fa fa-heart"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                                <div class="postlist-meta-collect collect collect-no" style="float:right;cursor:default;" title="必须登录才能收藏">
                                    <i class="fa fa-star"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                            </div>
                            <p> 在今天这样一个时代 ，提倡“严肃阅读”很容易被扣上“精英主义
                                ”的帽子，在一个所谓多元化和平等的时代，阅读变成完全个人化的私事，包括其阅读的文本、阅读的方式乃至阅读的目标，都是由个人的偏好与习惯所决定，任何他人都没有足够的正当理由来进行臧否或指责。因此，当我在与旅美学者徐贲教授的对谈中，对青年一代大学生的阅读状况表达了某些忧虑时，便遭受了个别网民和读者愤怒的“反击”：凭什么我们的阅读清单和阅读方式<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5156.html"></a>
                            </p>
                        </article>
                    </span>
                    <span class="col-right catlist-style2">
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5140.html" title="我们何以是今天的模样——评《人类简史》" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/04/A-brief-history-of-humankind.jpg?imageView2/1/w/375/h/250/q/100" alt="我们何以是今天的模样——评《人类简史》" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5140.html" title="我们何以是今天的模样——评《人类简史》">我们何以是今天的模样——评《人类简史》</a></h3>
                            <p>
                                《2001太空漫游》中有一个经典的镜头：荒野中生活着一群猿人，没有语言，只有嘶吼，它们也还不会利用工具，只能靠蛮力斗争，然而在神秘巨石的指引下，一个猿人对着动物的枯骨忽有所悟，他忽地抓起骨头猛烈地敲击，这是猿人第一次开始使用工具，此时画面切换到数百万年之后，一艘与骨头形状相像的宇宙飞船静静地游弋在广袤无垠的太空之中。从骨头到飞船，从动物到“上帝”，人类的巨大飞跃，超乎想象。
                                地球上从来没有一个物种<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5140.html"></a> </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5120.html" title="读书会给人好胃口" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/38.jpg?imageView2/1/w/375/h/250/q/100" alt="读书会给人好胃口" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5120.html" title="读书会给人好胃口">读书会给人好胃口</a></h3>
                            <p> 一 经常被问到：读书有什么用？这很难回答，好像真的没什么用，不会给你黄金屋和颜如玉，只能给你近视眼和青光眼。
                                但我觉得至少有一点好处：读书，可以给我们好胃口。 说起来很神奇，小的时候有点挑食，这毛病居然很大程度上是靠看书治好的。 比如白煮蛋。
                                小时候最讨厌吃白煮鸡蛋，觉得难以下咽，简直会噎死人，但我妈总要每天早上塞一颗，结果不是被我偷偷丢掉，就是在书包里放两三天，滚得稀碎。小男孩嘛，不知道蛋蛋的价<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5120.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5109.html" title="有哪些书适合每天睡前读，有趣又能学到知识的？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/37.jpg?imageView2/1/w/375/h/250/q/100" alt="有哪些书适合每天睡前读，有趣又能学到知识的？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5109.html" title="有哪些书适合每天睡前读，有趣又能学到知识的？">有哪些书适合每天睡前读，有趣又能学到知识的？</a></h3>
                            <p> 在坚持阅读中，找到更好的自己。 我很相信一句话，we are what we
                                read。所以，一直以来我都有睡前阅读50分钟的习惯。我也特别享受这种碎片时间里的阅读。虽然每天只有50分钟，但长期坚持下来，我感觉这种阅读对自己事业上、学习上潜移默化中的提升非常大。
                                首先，什么书适合睡前30~60分钟阅读呢？我觉得这种枕边书需要满足以下条件： a.拿得起 拿得起，指的是书的内容有比较有趣。也指该书的语<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5109.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5086.html" title="梁实秋：漫谈读书" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/18.jpg?imageView2/1/w/375/h/250/q/100" alt="梁实秋：漫谈读书" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5086.html" title="梁实秋：漫谈读书">梁实秋：漫谈读书</a></h3>
                            <p>
                                我们现代人读书真是幸福。古者，“著于竹帛谓之书”，竹就是竹简，帛就是缣素。书是希罕而珍贵的东西。一个人若能垂于竹帛，便可以不朽。孔子晚年读《易》，韦编三绝，用韧皮贯联竹简，翻来翻去以至于韧皮都断了，那时候读书多么吃力！后来有了纸，有了毛笔，书的制作比较方便，但在印刷之术未行以前，书的流传完全是靠抄写。我们看看唐人写经，以及许多古书的钞本，可以知道一本书得来非易。自从有了印刷术，刻版、活字、石印、影<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5086.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5052.html" title="《苏联的最后一天》：让民主自由的子弹飞一会儿" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/06/M.jpg?imageView2/1/w/375/h/250/q/100" alt="《苏联的最后一天》：让民主自由的子弹飞一会儿" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5052.html" title="《苏联的最后一天》：让民主自由的子弹飞一会儿">《苏联的最后一天》：让民主自由的子弹飞一会儿</a></h3>
                            <p> 1991年12月25日，基督教的世界正在准备他们的圣诞节，而已经存在了69年的苏联在一夜之间轰然倒掉。在这一天，苏联到底发生了什么？
                                而在这一天之前的几个月、几年甚至几十年里边，这个横跨亚欧大陆的超级大国，又到底是如何一步一步地走向灭亡的？爱尔兰人奥克莱利当时恰好是《爱尔兰报》驻莫斯科的记者，他用《苏联的最后一天》这本书的篇幅，试图回答这一非常值得国人深究的问题。
                                本书采用的叙事模式十分有趣，单数<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5052.html"></a> </p>
                        </article>
                    </span>
                </div>
            </section>
            <section class="catlist-947 catlist clr">
                <div class="catlist-container clr">
                    <h2 class="home-heading clr"> <span class="heading-text"> 浮世绘 </span> <a href="http://www.iydu.net/shallowreading/phenomena">+
                            更多</a> </h2>
                    <span class="col-left catlist-style2">
                        <article class="home-blog-entry clr">
                            <a href="http://www.iydu.net/5133.html" title="抗战老兵：“我们不怕死亡，我们怕被遗忘”" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/laobing.png?imageView2/1/w/375/h/250/q/100" alt="抗战老兵：“我们不怕死亡，我们怕被遗忘”" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5133.html" title="抗战老兵：“我们不怕死亡，我们怕被遗忘”">抗战老兵：“我们不怕死亡，我们怕被遗忘”</a></h3>
                            <div class="postlist-meta">
                                <span class="postlist-meta-time">2016-09-14</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-views">8&nbsp;℃</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="http://www.iydu.net/5133.html#comments">0</a></span>
                                <div class="postlist-meta-like like-btn" style="float:right;" pid="5133" title="点击喜欢">
                                    <i class="fa fa-heart"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                                <div class="postlist-meta-collect collect collect-no" style="float:right;cursor:default;" title="必须登录才能收藏">
                                    <i class="fa fa-star"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                            </div>
                            <p> 以下内容根据南京大学历史学院院长张生、江苏社科院历史研究所助理研究员董为民口述编辑而成。 抗战老兵群像：他们为什么被遗忘？
                                抗战老兵究竟是怎样一群人？他们又为什么被遗忘？这和公众以往印象里的抗战老兵确实是有区别的。
                                我们说的老兵，既有写进课本、我们耳熟能详的八路军新四军，也有曾经在正面战场上为国浴血奋战的那一群人。
                                抗战老兵均来自中国，但由于分属不同的阵营，他们获得的关注并不相同，有不同的人生际遇<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5133.html"></a>
                            </p>
                        </article>
                    </span>
                    <span class="col-right catlist-style2">
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5098.html" title="郎平：一颗被不朽热爱和艰难岁月打磨而成的钻石" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/08/langping.jpg?imageView2/1/w/375/h/250/q/100" alt="郎平：一颗被不朽热爱和艰难岁月打磨而成的钻石" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5098.html" title="郎平：一颗被不朽热爱和艰难岁月打磨而成的钻石">郎平：一颗被不朽热爱和艰难岁月打磨而成的钻石</a></h3>
                            <p>
                                北京时间2016年8月21日上午，里约奥运会女排决赛，中国女排迎战塞尔维亚女排。最终，中国女排3：1战胜实力强劲的对手，时隔12年再次问鼎奥运。
                                时隔32年，唯一一个两次作为主要参与人亲历女排奥运夺冠的女强人、超级女汉子、铁榔头——郎平成为了各大自媒体争相追捧的明星。这一刻看着被郎平刷爆的朋友圈，脑海中闪现出一颗璀璨夺目的钻石。没错，郎平身上闪现的人性光辉和钻石一样闪耀星空，永不磨灭。
                                这颗钻石初<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5098.html"></a> </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5025.html" title="华莉丝&middot;迪里：一个令28个国家的男人闻风丧胆的女人" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/05/Waris-Dirie.jpg?imageView2/1/w/375/h/250/q/100" alt="华莉丝&middot;迪里：一个令28个国家的男人闻风丧胆的女人" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5025.html" title="华莉丝&middot;迪里：一个令28个国家的男人闻风丧胆的女人">华莉丝&middot;迪里：一个令28个国家的男人闻风丧胆的女人</a></h3>
                            <p> 华莉丝&middot;迪里，一个从非洲走出来的牧羊女，将糟糕的命运底牌重洗，开出惊艳世界的沙漠之花。
                                在福布斯选出的三十位全球女性典范中，华莉丝&middot;迪里位列其中。作为世界顶级的超模和第一位登上杂志封面的黑人模特，她人生的经历堪称传奇，而她的不幸的遭遇更是令人震惊，愤怒，同情以至感动。
                                她的传奇经历被导演搬上银幕，索马里女性的悲惨遭遇，和割礼这种习俗对女性身体的摧残，才开始引起世界性的关注。她赢得全世界人的尊重，不<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5025.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5022.html" title="【专题】那个叫杨绛的女人" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/05/yangjiang.jpg?imageView2/1/w/375/h/250/q/100" alt="【专题】那个叫杨绛的女人" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5022.html" title="【专题】那个叫杨绛的女人">【专题】那个叫杨绛的女人</a></h3>
                            <p>
                                2016年5月25日凌晨，著名女作家、文学翻译家和外国文学研究家、钱锺书夫人杨绛在北京协和医院病逝，享年105岁。钱锺书曾用一句话，概括他与杨绛的爱情：“绝无仅有的结合了各不相容的三者：妻子、情人、朋友。”
                                才女杨绛走了，“我们仨”天上见 105岁的杨绛先生在北京去世。
                                这位见证了百年岁月动荡的奇女子，作家、翻译家、剧作家，钱钟书的妻子，一颗高贵、明朗而生动的灵魂，如她所愿“回家了”。 在民国时期<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5022.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5000.html" title="周星驰时代结束了吗？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/05/zhouxingchi.jpg?imageView2/1/w/375/h/250/q/100" alt="周星驰时代结束了吗？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5000.html" title="周星驰时代结束了吗？">周星驰时代结束了吗？</a></h3>
                            <p>
                                作为一个笑点比较奇怪的人，周星驰的无厘头喜剧一度很难打动我，尤其是在他最红，电视里天天滚动播放那几部《国产凌凌漆》、《逃学威龙》时，我在周围人的“哈哈哈哈”中无所适从，小人物逆袭的悲喜，夸张的、磨嘴皮的遭际，阅历使我无法会意时，一度误解他是逢迎市场的笑匠。直到很多年后，看《喜剧之王》，周星驰扮演的尹天仇因为改戏被吴孟达骂“命不如蚊”，他面上堆着笑，讪讪的，转身后泪夺眶出，我心里咯噔一下，才懂得在悲<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5000.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/4953.html" title="他21岁，凭什么就赚到5亿美元" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/04/Palmer-Luckey.jpg?imageView2/1/w/375/h/250/q/100" alt="他21岁，凭什么就赚到5亿美元" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/4953.html" title="他21岁，凭什么就赚到5亿美元">他21岁，凭什么就赚到5亿美元</a></h3>
                            <p>
                                虚拟现实的大潮已到。Facebook、腾讯、阿里……早已纷纷进入这个领域。回溯这个大潮的源头时，我们惊奇地发现：它源自一个1993年出生的美国青年——帕尔默&middot;洛基。他没怎么念过书，但在21岁时就已经赚到了5亿美元。
                                扎克伯格出价20亿美元 2014年1月末，
                                Facebook创始人扎克伯格造访了南加州埃尔文市的一个初创公司。两周前，在Facebook位于门罗帕克市的总部，扎克和他的高管们被这家公司<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/4953.html"></a>
                            </p>
                        </article>
                    </span>
                </div>
            </section>
            <section class="catlist-829 catlist clr">
                <div class="catlist-container clr">
                    <h2 class="home-heading clr"> <span class="heading-text"> 新视野 </span> <a href="http://www.iydu.net/shallowreading/vision">+
                            更多</a> </h2>
                    <span class="col-left catlist-style2">
                        <article class="home-blog-entry clr">
                            <a href="http://www.iydu.net/5154.html" title="美国社会的自信" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/meiguoshehui.jpg?imageView2/1/w/375/h/250/q/100" alt="美国社会的自信" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5154.html" title="美国社会的自信">美国社会的自信</a></h3>
                            <div class="postlist-meta">
                                <span class="postlist-meta-time">2016-09-29</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-views">1&nbsp;℃</span>
                                <span class="delim"></span>
                                <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="http://www.iydu.net/5154.html#comments">0</a></span>
                                <div class="postlist-meta-like like-btn" style="float:right;" pid="5154" title="点击喜欢">
                                    <i class="fa fa-heart"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                                <div class="postlist-meta-collect collect collect-no" style="float:right;cursor:default;" title="必须登录才能收藏">
                                    <i class="fa fa-star"></i>&nbsp;
                                    <span>0</span>&nbsp;
                                </div>
                            </div>
                            <p>
                                记得刚到美国时，去买食品，光啤酒就有十几个牌子，有的牌子还分干啤、冰啤、轻啤。过去我习惯了没有太多选择的社会，从那时起我不得不开始做出一个又一个的选择。
                                生活中，美国社会给了我多一些的选择，也给了我多一些的责任，多一些的自信。
                                来美国的有些亚州新贵们，很快就发现他们身边少了一份熟悉的羡慕，便多了一份失落。于是，他们随时分发印有董事长头衔的名片，结果并不管用。
                                于是又一掷千金，买下华屋名车。可气的是<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5154.html"></a> </p>
                        </article>
                    </span>
                    <span class="col-right catlist-style2">
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5136.html" title="这么多大国，为什么治不了一个朝鲜？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/09/jinzhengen.jpg?imageView2/1/w/375/h/250/q/100" alt="这么多大国，为什么治不了一个朝鲜？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5136.html" title="这么多大国，为什么治不了一个朝鲜？">这么多大国，为什么治不了一个朝鲜？</a></h3>
                            <p>
                                当金正恩上台的时候，外面的世界对这个不到30岁的年轻人还有些期待，希望有西方留学经历的他能为这个破败不堪的国家带去一些朝气，然而他除了把自己吃得越来越胖并娶了个貌美如花的乐团主唱之外，还大肆清洗对自己不敬的前朝元老，甚至传出了当众“炮决”“犬决”“机关枪扫射”等骇人听闻的杀人手段。
                                更让外界感到忧虑的是，他带领下的朝鲜在“宇宙第一强国”的道路上越走越远，金正恩上任5年来射出去的导弹超过了此前几十年<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5136.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5110.html" title="低效率的德国与高效益的德国" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/34.jpg?imageView2/1/w/375/h/250/q/100" alt="低效率的德国与高效益的德国" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5110.html" title="低效率的德国与高效益的德国">低效率的德国与高效益的德国</a></h3>
                            <p> 国内常有人批评德国、日本的决策缺乏效率：“提出一个议案需要讨论150天，黄花菜都凉了。哪像我们中国决策就是高效率！”
                                与中国相对比，德国的决策简直是“低效”到了极点：由于上世纪80年代反核运动及绿党的崛起，哈瑙核工厂经过5年的建设完工后，连一根燃料棒也没有生产过。当时的德国外长菲舍尔初次参政就是在黑森州任环境保护部长，这家工厂以及原有一个老核材料加工厂正好归他管辖。经过无穷无尽的争论、繁复的安全审<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5110.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5087.html" title="最乱奥运？我们对巴西可能一无所知" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/08/Rio-2016.jpg?imageView2/1/w/375/h/250/q/100" alt="最乱奥运？我们对巴西可能一无所知" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5087.html" title="最乱奥运？我们对巴西可能一无所知">最乱奥运？我们对巴西可能一无所知</a></h3>
                            <p>
                                还有不到24个小时，里约奥运会就要开幕了。在奥运之前的这段时间，众多有关巴西和里约热内卢治安混乱、工期拖延、病毒肆虐的报道见诸媒体，圣火尚未点燃，“史上最乱”奥运会的帽子早早就扣在了里约的头上。而这也成了段子手们的热门素材，一时间各国运动员在里约街头遭到抢劫的段子层出不穷，几乎让人难辨真假。网友们体会到的还不仅仅是调侃的快乐，更有并不隐秘的优越和自豪。
                                但是，为黑而黑的段子能让我们对巴西有更多了解<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5087.html"></a> </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5069.html" title="关于巴黎的33个冷门小知识" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/07/bali.jpg?imageView2/1/w/375/h/250/q/100" alt="关于巴黎的33个冷门小知识" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5069.html" title="关于巴黎的33个冷门小知识">关于巴黎的33个冷门小知识</a></h3>
                            <p> 1.巴黎的名字来自于公元前三世纪，在这之前它被称为鲁特西亚（Lutetia）。
                                2.据史料记载，鲁特西亚位于现在法国的楠泰尔，那里的居民称自己为“Parisii”,于是他们把鲁特西亚命名为 “Paris”（巴黎）。
                                3.在全球总共有28个城市叫做“Paris”, 从美国到瑞典，甚至在巴拿马。 4.新桥（Pont
                                Neuf）是巴黎最古老的桥，它被建于1604年。 5.建于1791年的先贤祠 （Pan<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5069.html"></a>
                            </p>
                        </article>
                        <article class="clr col-small">
                            <a href="http://www.iydu.net/5054.html" title="未来世界霸主：为什么中国取代不了美国？" class="fancyimg home-blog-entry-thumb">
                                <div class="thumb-img">
                                    <img src="http://www.iydu.net/wp-content/uploads/2016/06/USA-CN.jpg?imageView2/1/w/375/h/250/q/100" alt="未来世界霸主：为什么中国取代不了美国？" />
                                    <span><i class="fa fa-pencil"></i></span>
                                </div>
                            </a>
                            <h3><a href="http://www.iydu.net/5054.html" title="未来世界霸主：为什么中国取代不了美国？">未来世界霸主：为什么中国取代不了美国？</a></h3>
                            <p>
                                过去二十五年间美国独霸世界，如今这一格局是否将走向尽头？很多人的答案是肯定的，他们看到中国正在崛起，大约在不久的将来就会赶超美国。从很多指标来看，中国的确在成为世界上最大的经济体，哪怕增长放缓，多年来增长速度仍快于美国。中国政府富得流油，利用其新获得的财力招朋引伴、威慑敌人，对军队进行现代化建设，并在其周边颇具侵略性地多次宣布主权。因此，对很多人而言，中国成为超级大国只是时间问题。
                                但这是不切实际<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5054.html"></a> </p>
                        </article>
                    </span>
                </div>
            </section>
            <section class="catlist clr">
                <section class="catlist-14 catlist_1_of_2">
                    <div class="catlist-container clr">
                        <h2 class="home-heading clr"> <span class="heading-text"> 鲜活科学 </span> <a href="lists.html?science">→
                                更多</a> </h2>
                        <span class="col-up catlist-style">
                            <article class="home-blog-entry clr">
                                <a href="http://www.iydu.net/5115.html" title="凉茶是药还是茶？" class="fancyimg home-blog-entry-thumb">
                                    <div class="thumb-img">
                                        <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/28.jpg?imageView2/1/w/375/h/250/q/100" alt="凉茶是药还是茶？" />
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
                                </a>
                                <div class="home-blog-entry-text clr">
                                    <h3> <a href="http://www.iydu.net/5115.html" title="凉茶是药还是茶？">凉茶是药还是茶？</a>
                                    </h3>
                                    <p>
                                        据中国食品工业协会统计显示，2015年，我国饮料行业全年累计总产量17661万吨，同比增长6.23%；其中，受消费者对健康诉求的提升影响，2015年凉<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5115.html"></a> </p>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/5081.html" title="如何养护自己的胃，不得胃病？">如何养护自己的胃，不得胃病？</a><span class="postlist-meta-time">2016-08-2</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/5048.html" title="减肥，无糖饮料比水好">减肥，无糖饮料比水好</a><span class="postlist-meta-time">2016-06-21</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4992.html" title="从红糖到大姨妈">从红糖到大姨妈</a><span class="postlist-meta-time">2016-05-9</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4950.html" title="坐月子不是科学说了算">坐月子不是科学说了算</a><span class="postlist-meta-time">2016-04-6</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4906.html" title="关于“问题疫苗”的所有问题">关于“问题疫苗”的所有问题</a><span class="postlist-meta-time">2016-03-23</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4867.html" title="自行车为什么放久了容易坏？">自行车为什么放久了容易坏？</a><span class="postlist-meta-time">2016-03-7</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4852.html" title="基站辐射其实没那么可怕">基站辐射其实没那么可怕</a><span class="postlist-meta-time">2016-03-1</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4848.html" title="40件普通大众不知道但医生清楚的事">40件普通大众不知道但医生清楚的事</a><span class="postlist-meta-time">2016-02-25</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                    </div>
                </section>
                <section class="catlist-935 catlist_1_of_2">
                    <div class="catlist-container clr">
                        <h2 class="home-heading clr"> <span class="heading-text"> 强文连载 </span> <a href="http://www.iydu.net/series">→
                                更多</a> </h2>
                        <span class="col-up catlist-style">
                            <article class="home-blog-entry clr">
                                <a href="http://www.iydu.net/4804.html" title="从噩梦到天堂：离婚四年的成长史（52）" class="fancyimg home-blog-entry-thumb">
                                    <div class="thumb-img">
                                        <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/17.jpg?imageView2/1/w/375/h/250/q/100" alt="从噩梦到天堂：离婚四年的成长史（52）" />
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
                                </a>
                                <div class="home-blog-entry-text clr">
                                    <h3> <a href="http://www.iydu.net/4804.html" title="从噩梦到天堂：离婚四年的成长史（52）">从噩梦到天堂：离婚四年的成长史（52）</a>
                                    </h3>
                                    <p>
                                        有句话叫“没吃过猪肉，也见过猪跑”，过去一些年我常与生意人打交道，自以为耳濡目染见多识广，经商是小菜一碟。可真正自己做起老板，才发现“见猪跑”跟“吃猪<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/4804.html"></a> </p>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4722.html" title="从噩梦到天堂：离婚四年的成长史（51）">从噩梦到天堂：离婚四年的成长史（51）</a><span class="postlist-meta-time">2015-12-14</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4594.html" title="从噩梦到天堂：离婚四年的成长史（50）">从噩梦到天堂：离婚四年的成长史（50）</a><span class="postlist-meta-time">2015-10-15</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4560.html" title="从噩梦到天堂：离婚四年的成长史（49）">从噩梦到天堂：离婚四年的成长史（49）</a><span class="postlist-meta-time">2015-09-9</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4516.html" title="从噩梦到天堂：离婚四年的成长史（48）">从噩梦到天堂：离婚四年的成长史（48）</a><span class="postlist-meta-time">2015-07-3</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4486.html" title="从噩梦到天堂：离婚四年的成长史（47）">从噩梦到天堂：离婚四年的成长史（47）</a><span class="postlist-meta-time">2015-06-8</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4464.html" title="从噩梦到天堂：离婚四年的成长史（46）">从噩梦到天堂：离婚四年的成长史（46）</a><span class="postlist-meta-time">2015-05-8</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4413.html" title="从噩梦到天堂：离婚四年的成长史（45）">从噩梦到天堂：离婚四年的成长史（45）</a><span class="postlist-meta-time">2015-03-29</span> </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4391.html" title="从噩梦到天堂：离婚四年的成长史（44）">从噩梦到天堂：离婚四年的成长史（44）</a><span class="postlist-meta-time">2015-03-16</span> </h3>
                                </div>
                            </article>
                        </span>
                    </div>
                </section>
                <section class="catlist-13 catlist_1_of_2">
                    <div class="catlist-container clr">
                        <h2 class="home-heading clr"> <span class="heading-text"> 能量加油站 </span> <a href="http://www.iydu.net/interest/encouragement">→
                                更多</a> </h2>
                        <span class="col-up catlist-style">
                            <article class="home-blog-entry clr">
                                <a href="http://www.iydu.net/4864.html" title="10位顶级投资家的 100句财富箴言" class="fancyimg home-blog-entry-thumb">
                                    <div class="thumb-img">
                                        <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/38.jpg?imageView2/1/w/375/h/250/q/100" alt="10位顶级投资家的 100句财富箴言" />
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
                                </a>
                                <div class="home-blog-entry-text clr">
                                    <h3> <a href="http://www.iydu.net/4864.html" title="10位顶级投资家的 100句财富箴言">10位顶级投资家的
                                            100句财富箴言</a> </h3>
                                    <p> 股神：沃伦.巴菲特 1. 要在别人贪婪的时候恐惧，而在别人恐惧的时候贪婪。 2. 如果你没有持有一种股票 10
                                        年的准备，那么连 10 分钟都不要持有<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/4864.html"></a> </p>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4854.html" title="勤奋和体面。">勤奋和体面。</a><span class="postlist-meta-time">2016-03-2</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4790.html" title="说读书">说读书</a><span class="postlist-meta-time">2016-01-12</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4720.html" title="10条人生建议">10条人生建议</a><span class="postlist-meta-time">2015-12-14</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4691.html" title="重点是要有目标">重点是要有目标</a><span class="postlist-meta-time">2015-11-29</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4616.html" title="生活不会一直是我们希望的样子">生活不会一直是我们希望的样子</a><span class="postlist-meta-time">2015-10-27</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4561.html" title="牛逼的人只讲成败">牛逼的人只讲成败</a><span class="postlist-meta-time">2015-09-15</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4515.html" title="做眼前事">做眼前事</a><span class="postlist-meta-time">2015-07-2</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4478.html" title="人生不留遗憾，现在就要出发">人生不留遗憾，现在就要出发</a><span class="postlist-meta-time">2015-05-26</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                    </div>
                </section>
                <section class="catlist-12 catlist_1_of_2">
                    <div class="catlist-container clr">
                        <h2 class="home-heading clr"> <span class="heading-text"> 冷笑话精选 </span> <a href="http://www.iydu.net/interest/humorous">→
                                更多</a> </h2>
                        <span class="col-up catlist-style">
                            <article class="home-blog-entry clr">
                                <a href="http://www.iydu.net/5067.html" title="制药专业" class="fancyimg home-blog-entry-thumb">
                                    <div class="thumb-img">
                                        <img src="http://www.iydu.net/wp-content/themes/tinection/images/random/11.jpg?imageView2/1/w/375/h/250/q/100" alt="制药专业" />
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
                                </a>
                                <div class="home-blog-entry-text clr">
                                    <h3> <a href="http://www.iydu.net/5067.html" title="制药专业">制药专业</a>
                                    </h3>
                                    <p> 有个同学是医生世家，高考后填志愿听了父母的意见去了北京理工的制药工程专业，去了后发现，制药制的是……炸药 (￣∇￣)<a rel="nofollow" class="more-link" style="text-decoration:none;" href="http://www.iydu.net/5067.html"></a> </p>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/5057.html" title="来，一起干了这碗馊鸡汤！">来，一起干了这碗馊鸡汤！</a><span class="postlist-meta-time">2016-06-28</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/5002.html" title="成功">成功</a><span class="postlist-meta-time">2016-05-13</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4905.html" title="大年初三">大年初三</a><span class="postlist-meta-time">2016-03-23</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4898.html" title="知乎上的那些神回复">知乎上的那些神回复</a><span class="postlist-meta-time">2016-03-22</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4892.html" title="吃不吃西瓜皮">吃不吃西瓜皮</a><span class="postlist-meta-time">2016-03-16</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4883.html" title="治病">治病</a><span class="postlist-meta-time">2016-03-14</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4882.html" title="笑和运气">笑和运气</a><span class="postlist-meta-time">2016-03-14</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                        <span class="col-down catlist-style">
                            <article class="home-smalllist-entry clr">
                                <div class="home-smalllist-entry-text clr">
                                    <h3> <i class="fa fa-pencil-square"></i> <a href="http://www.iydu.net/4876.html" title="魔高一尺道高一丈">魔高一尺道高一丈</a><span class="postlist-meta-time">2016-03-10</span>
                                    </h3>
                                </div>
                            </article>
                        </span>
                    </div>
                </section>
            </section> -->
            <!-- pagination -->
            <div class="clear">
            </div>
            <div class="pagination">
            </div>
            <!-- /.pagination -->
        </div>
        <script type="text/javascript">
            $('.site_loading').animate({
                'width': '55%'
            }, 50); //第二个节点
        </script>
        <!-- 父模版右侧标栏 -->
        @parent
        <!-- 父模版右侧标栏 结束 -->
    </div>
    <div class="clear">
    </div>
    <!-- Blocks Layout -->
</div>
@endsection