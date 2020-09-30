<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户新增页面</title>
</head>

<body>

    <table border="1" cellpadding="10">
        <form action="{{ url('user/store') }}" method="post">
            @csrf
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit">添加</button></td>
            </tr>
        </form>
    </table>

</body>

</html>