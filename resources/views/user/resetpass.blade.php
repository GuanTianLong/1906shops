<!DOCTYPE html>
<html lang="en">

<head>
    <title>重置密码</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="/static/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="/static/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
<div class=" w3l-login-form">
    <h2>重置密码</h2>
    <form action="{{url('/resetpass')}}" method="post">
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="password" class="form-control" name="pwd1" placeholder="密码" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="password" class="form-control" name="pwd2" placeholder="确认密码" required="required" />
            </div>
        </div>
        <input type="hidden" name="resetToken" value="{{$token}}">
        <button type="submit">重置</button>
    </form>
</div>
<footer>
    <p class="copyright-agileinfo"> &copy; Welcome to 1906shop</p>
</footer>

</body>

</html>