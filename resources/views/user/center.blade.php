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
</head>
<body>
<b style="color: darkturquoise">欢迎<i style="color: red">{{session('user_name')}}</i>来到个人中心</b><hr>
<a href="/changepass">修改密码</a>
</body>
</html>