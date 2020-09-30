<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户编辑页面</title>
</head>

<body>

    <table border="1" cellpadding="10">
        <form action="{{ url('user/update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" value="{{$user->username}}"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit">更新</button></td>
            </tr>
        </form>
    </table>

</body>

</html>