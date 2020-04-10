<?php

if(empty(session('user_name'))){
    echo "<script>alert('请您先去登录!');location.href='/login'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link href="/static/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="/static/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
</head>
<body>
<div class=" w3l-login-form">
<b style="color: darkturquoise">欢迎<i style="color: red">{{session('user_name')}}</i>来到个人中心</b><hr>
    <form action="{{url('/user/outlogin')}}" method="post">
            <button>点我退出</button><hr>
    </form>
<a href="/changepass">修改密码</a><hr>
</div>

</body>
</html>