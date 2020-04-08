<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找回密码</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <form action="/findPass" method="post" role="form">
        <div class="form-inline"  class="form-group"  style="text-align:center;">
            <label for="name">找回密码</label>
            <input type="text" class="form-control" id="name" name="u" placeholder="请输入用户名\邮箱\手机号">
            <button type="submit" class="btn btn-default">提交</button>
        </div>
    </form>
</body>
</html>