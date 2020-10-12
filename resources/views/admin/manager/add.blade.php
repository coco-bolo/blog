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
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 管理员名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" lay-verify="name" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>将会成为您唯一的登入名
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span> 密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="pass" lay-verify="pass" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">6到18个字符</div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span> 确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repass" lay-verify="repass" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 手机号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="tel" name="tel" lay-verify="phone" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="email" name="email" lay-verify="email" autocomplete="off" class="layui-input">
                    </div>
                </div>
      
                <div class="layui-form-item">
                    <label class="layui-form-label">角色</label>
                    <div class="layui-input-block">
                        @foreach ($roles as $role)
                            <input type="checkbox" name="ids[]" lay-skin="primary" value="{{$role->id}}" title="{{$role->rolename}}">
                        @endforeach
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <button class="layui-btn" lay-filter="add" lay-submit>
                        增加
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
                        return '管理员名称至少得4个字符啊';
                    }
                },
                pass: [/(.+){6,18}$/, '密码必须6到18位'],
                repass: function(value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                },
            });

            //监听提交
            form.on('submit(add)', function(data) {
                console.log(data);
                //发异步，把数据提交给php
                $.ajax({
                    url: '/admin/manager',
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