<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.2</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.public.styles')
    @include('admin.public.script')
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form action="" method="post" class="layui-form layui-form-pane">
                <input type="hidden" name="id" value="{{$role->id}}">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span> 角色名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="rolename" name="rolename" required="" lay-verify="rolename" autocomplete="off"
                            class="layui-input" value="{{$role->rolename}}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table class="layui-table layui-input-block">
                        <tbody>
                            @foreach ($permission_collection->getImmediateDescendants() as $permissions)
                                <tr>
                                    <td>
                                        <input type="checkbox" lay-skin="primary" lay-filter="father" title="{{$permissions->name}}">
                                    </td>
                                    <td>
                                        @if (!$permissions->isLeaf())
                                            <div class="layui-input-block">
                                                @foreach ($permissions->getImmediateDescendants() as $permission)
                                                    <input name="ids[]" lay-skin="primary" type="checkbox" value="{{$permission->id}}" 
                                                    title="{{$permission->name}}" @if (in_array($permission->id, $per_ids)) checked @endif>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="desc" class="layui-textarea">{{$role->desc}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="edit">修改</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form
                , layer = layui.layer;

            //自定义验证规则
            form.verify({
                rolename: function (value) {
                    if (value.length < 4) {
                        return '角色名至少得4个字符啊';
                    }
                }
            });

            //监听提交
            form.on('submit(edit)', function (data) {
                console.log(data);
                var id = $('input[name="id"]').val();
                //发异步，把数据提交给php
                $.ajax({
                    url: '/admin/role/' + id,
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


            form.on('checkbox(father)', function (data) {

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