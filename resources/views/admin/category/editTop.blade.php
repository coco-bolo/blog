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
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form">
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 顶级分类名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" lay-verify="name" autocomplete="off" class="layui-input" value="{{$category->name}}">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>唯一
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <button class="layui-btn" lay-filter="edit" lay-submit>
                        修改
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form', 'layer'], function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //自定义验证规则
            form.verify({
                name: function(value) {
                    if (value.length < 2) {
                        return '分类名称至少得2个字符啊';
                    }
                },
            });

            //监听提交
            form.on('submit(edit)', function(data) {
                console.log(data);
                var id = $('input[name="id"]').val();
                //发异步，把数据提交给php
                $.ajax({
                    url: '/admin/category/' + id,
                    method: 'put',
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
                                // window.location.href = "{{route('category.index')}}";
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

            // form.on('switch(father)', function(data) {
            //     if (data.elem.checked) {
            //         $('select[name=parent_id]').parent().parent().addClass('layui-hide')
            //     } else {
            //         $('select[name=parent_id]').parent().parent().removeClass('layui-hide')
            //     }
            // });

        });
    </script>
</body>

</html>