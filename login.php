<!DOCTYPE html>
<html>
  <head>
    <title>用户登录</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <div class="main">
        <div class="container">
            <div class="logo">
              <img class="logo1" src="images/2.png" width="180px" height="50px">
            </div>
            <div class="meau">
              <ul>
                <li><a href="register.php">Sign up</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Explore</a></li>
              </ul>
            </div>
            <div class="search-box">
              <form action="" method="post">
                  <input  class="button" type="image" src="images/1.png" width="17px" height="17px;" />
                  <input name="" type="text" class="input-box" />
              </form>
            </div>
            <div class="navbar">
              <span>Log in</span><br>
                <fieldset>
              <form name="LoginForm" method="post" action="check-login.php" onSubmit="return InputCheck(this)">
              <p class="E-mailadress">Username<br><input id="username" class="adress" type="test" name="username"></p>

              <p class="Passwords">Password<br><input  id="password" class="pass" type="password" name="password"></p>
                <P class="yzm">Captcha<br><input class="yzm2" type="text" name='authcode' value=''/>
                <img  class="yzmimg" id="captcha_img" border='1' src='./captcha.php?r=echo rand(); ?>' />
              <a href="login.php" onclick="document.getElementById('captcha_img').src='captcha.php?r='+Math.random()">换一个?</a>
                </p>

              <input class="log" type="submit" name="submit" value="Log in" />
              <a  class="forgot" href="#">Forgot your password?</a>
            </form>
          </fieldset>
            </div>
            <div class="fooster">
              <ul>
                <li>@ Tumblr. Inc.</li>
                <li><a href="#"> Help</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">What's New</a></li>
                <li><a href="#">API</a></li>
                <li><a href="#">Content Polipr</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            </div>
        </div>
   </div>
  </body>
  <script language=JavaScript>
 <!--
 function InputCheck(LoginForm)
 {
   if (LoginForm.username.value == "")
   {
     alert("请输入用户名!");
    LoginForm.username.focus();
     return (false);
   }
   if (LoginForm.password.value == "")
   {
     alert("请输入密码!");
     LoginForm.password.focus();
     return (false);
   }
 }
</script>

</html>
