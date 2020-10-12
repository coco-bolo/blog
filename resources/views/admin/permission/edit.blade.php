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
                <input type="hidden" name="id" value="{{$permission->id}}">
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span> 权限分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="parent_id" lay-verify="required">
                            <option value=""></option>
                            @foreach($perm_cates as $perm_cate)
                                @if ($permission->parent_id == $perm_cate->id)
                                    <option value="{{$perm_cate->id}}" selected>{{$perm_cate->name}}</option>
                                @else
                                    <option value="{{$perm_cate->id}}">{{$perm_cate->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 权限名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" lay-verify="name" autocomplete="off" class="layui-input" value="{{$permission->name}}">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>唯一
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 权限路由
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="url" name="url" lay-verify="required" autocomplete="off" class="layui-input" value="{{$permission->url}}">
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
                    if (value.length < 4) {
                        return '权限名称至少得4个字符啊';
                    }
                },
            });

            //监听提交
            form.on('submit(edit)', function(data) {
                console.log(data);
                //发异步，把数据提交给php
                id = $('input[name="id"]').val();
                $.ajax({
                    url: '/admin/permission/' + id,
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