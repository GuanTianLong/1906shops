<!DOCTYPE html>
<html lang="en">

<head>
    <title>用户登录</title>
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
    <h2>Login Here</h2>
    <form action="{{url('/login_do')}}" method="post">
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="account" placeholder="Username  /Moblie  /Email" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password" class="form-control" name="pass" placeholder="Password" required="required" />
            </div>
        </div>
        <div class="forgot">
            <a href="#">Forgot Password?</a>
            <p><input type="checkbox">Remember Me</p>
        </div>
        <button type="submit">Login</button>
    </form>
    <p class=" w3l-register-p">Don't have an account?<a href="{{url('/register')}}" class="register"> Register</a></p>
    <p class=" w3l-register-p">Retrieve password！<a href="{{url('/findpass')}}" class="register"> FindPass</a></p>
    <p class=" w3l-register-p">Change Password！<a href="{{url('/change_pass')}}" class="register"> Change Password</a></p>
</div>
<footer>
    <p class="copyright-agileinfo"> &copy; Welcome to personal login</p>
</footer>

</body>

</html>