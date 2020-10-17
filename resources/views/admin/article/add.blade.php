<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.2</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.public.styles')
    @include('admin.public.script')
    <script type="text/javascript" src="//unpkg.com/wangeditor/dist/wangEditor.min.js"></script>
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="title" class="layui-form-label">
                        <span class="x-red">*</span> 文章标题
                    </label>
                    <div class="layui-input-inline" style="width: 500px;">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="editor" class="layui-form-label">
                        <span class="x-red">*</span> 编辑
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="editor" lay-verify="editor" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="tag" class="layui-form-label">
                        <span class="x-red">*</span> 标签
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="tag" lay-verify="tag" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">
                        <span class="x-red">*</span> 缩略图
                    </label>
                    <div class="layui-input-inline">
                        <button type="button" class="layui-btn" id="thumb">
                            <i class="layui-icon">&#xe67c;</i>上传图片
                        </button>
                    </div>
                    <!-- 隐藏域 -->
                    <input type="hidden" name="thumb">
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label"></label>
                    <div class="layui-input-inline">
                        <img id="thumb_img" src="">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span> 描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入" name="desc" class="layui-textarea" style="height: 150px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="content" class="layui-form-label">
                        <span class="x-red">*</span> 内容
                    </label>
                    <div class="layui-input-block">
                        <div id="editor"></div>
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <button lay-submit class="layui-btn" lay-filter="add">添加</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const E = window.wangEditor
        const editor = new E('#editor')
        editor.config.height = 400
        editor.config.zIndex = 500
        editor.config.uploadImgServer = '{{route("article.imgUpload")}}'
        editor.config.uploadImgMaxSize = 2 * 1024 * 1024
        editor.config.uploadImgMaxLength = 5
        // editor.config.uploadFileName = 'files'
        editor.config.uploadImgHeaders = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        // editor.config.showLinkImg = false
        editor.config.uploadImgHooks = {
            // 图片上传并返回了结果，图片插入已成功
            success: function(xhr) {
                console.log('success', xhr)
            },
            customInsert: function(insertImgFn, result) {
                // result 即服务端返回的接口
                console.log('customInsert', result)

                // insertImgFn 可把图片插入到编辑器，传入图片 src ，执行函数即可
                for (var j = 0; j < result.data.length; j++) {
                    insertImgFn('http://' + "{{env('QINIU_DOMAIN')}}" + '/' + result.data[j]);
                }
                // insertImgFn('http://' + "{{env('QINIU_DOMAIN')}}" + '/' + result.data.path)
            }
        }

        editor.create()

        layui.use(['form', 'layer', 'upload'], function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer,
                upload = layui.upload;

            //自定义验证规则
            form.verify({
                title: function(value) {
                    if (value.length < 4) {
                        return '标题至少得4个字符';
                    }
                },
                editor: function(value) {
                    if (value.length < 2) {
                        return '编辑至少得2个字符';
                    }
                },
                tag: function(value) {
                    if (value.length < 2) {
                        return '标签至少得2个字符';
                    }
                }
            });

            //执行实例
            var uploadInst = upload.render({
                elem: '#thumb', //绑定元素
                url: '/admin/article/thumbUpload', //上传接口
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                accept: 'images',
                size: 100,
                done: function(res) {
                    // alert(res.data.path);
                    if (res.code) {
                        layer.alert(res.msg, {
                            icon: 5
                        })
                    } else {
                        layer.alert(res.msg, {
                            icon: 6
                        })
                        $('input[name=thumb]').val(res.data.path)
                        $('#thumb_img').attr('src', 'http://' + "{{env('QINIU_DOMAIN')}}" + '/' + res.data.path)
                    }
                },
                error: function() {
                    //请求异常回调
                }
            });

            //监听提交
            form.on('submit(add)', function(data) {
                data.field.content = editor.txt.html();
                console.log(data);
                
                //发异步，把数据提交给php
                $.ajax({
                    url: '{{route("article.store")}}',
                    method: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data.field,
                    success: (data) => {
                        // console.log(data);
                        if (data.status) {
                            layer.alert(data.msg, {
                                icon: 6
                            }, () => {
                                //关闭当前frame
                                xadmin.close();
                                // 可以对父窗口进行刷新 
                                xadmin.father_reload();
                            });
                        } else {
                            layer.alert(data.msg, {
                                icon: 5
                            });
                        }
                    }
                });
                // layer.alert("增加成功", { icon: 6 }, function () {
                //     // 获得frame索引
                //     var index = parent.layer.getFrameIndex(window.name);
                //     //关闭当前frame
                //     parent.layer.close(index);
                // });
                return false;
            });


            form.on('checkbox(father)', function(data) {

                if (data.elem.checked) {
                    $(data.elem).parent().siblings('td').find('input').prop("checked", true);
                    form.render();
                } else {
                    $(data.elem).parent().siblings('td').find('input').prop("checked", false);
                    form.render();
                }
            });


        });
    </script>
</body>

</html>