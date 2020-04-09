<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册页面</title>
</head>
<body>
    <form action="{{url('/changepass')}}" method="post">
    @csrf
    输入当前密码 :  <input type="password" name="oldpwd">   <br>
     新密码  :  <input type="password" name="newpwd"> <br>
      确认新密码 :  <input type="password" name="newspwd"> <br>
        <input type="submit" value="修改">
    </form>
</body>
</html>