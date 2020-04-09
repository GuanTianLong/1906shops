<!DOCTYPE html>
<html lang="en">

<head>
    <title>用户注册</title>
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
    <h2>Register Here</h2>
    <form action="{{url('/regdo')}}" method="post">
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="user_name" placeholder="Username" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password" class="form-control" name="pass" placeholder="Password" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password" class="form-control" name="pass1"placeholder="Confirm Password" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fa fa-phone"></i>
                <input type="text" class="form-control" name="tel" placeholder="Mobile" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fa fa-envelope"></i>
                <input type="text" class="form-control" name="email" placeholder="Email" required="required" />
            </div>
        </div>
        <div class="forgot">
            <a href="#">Forgot Password?</a>
            <p><input type="checkbox">Remember Me</p>
        </div>
        <button type="submit">Register</button>
    </form>
    {{--<p class=" w3l-register-p">Have an account！<a href="/index/login/login.html" class="register">Login</a></p>--}}
</div>
{{--<footer>--}}
    {{--<p class="copyright-agileinfo"> &copy; Welcome to personal register</p>--}}
{{--</footer>--}}

</body>

</html>