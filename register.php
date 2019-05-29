
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>用户注册</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script type="text/javascript" src="js/face.js"></script>
  </head>
  <body>
    <div class="container">
       <img  class="logo" src="images/2.png">
     <div class="main">
        <span class="zhuche">注册账号<br><hr class="hr"></span>
        <fieldset>
        <form action="check-register.php" method="post">

        <p class="name">昵称 <input  class="nametest" type="test" name="username"/></p>

        <p class="Passwords1">密码<input   class="passtest1" type="password" name="first_pass"/></p>

        <p class="Passwords2">确认密码<input  class="passtest2" type="password" name="second_pass"/></p>

        <p class="really">真实姓名<input  class="reallyname" type="test" name="reallyname"/></p>

        <p class="radio">性别<input  class="radio1" name="sex" type="radio" value="1"checked/>男
          <input class="radio1" name="sex" type="radio" value="0">女<p>

            <p class="imgstyles">头像<input type="hidden" name="face" value="face/face01.jpg" id="imgip" />
            <img src="face/face01.jpg" alt="头像选择" id="faceimg" class="imgstyle"/>

            </p>
            <p class="brithday">出生日期
            <select class="nian" id="" name="select1">
            <?php for ($i=1949;$i<=2014;$i++) { ?>
                <option value="<?php echo $i;?>" ><?php echo $i;?></option>
            <?php   } ?>
            </select>
            <select class="yue" id=""name="select2">
            <?php  for ($i=1;$i<12;$i++) {?>
                <option  value="<?php echo $i;?>" ><?php echo $i;?></option>
          <?php   } ?>
            </select>
            <select  class="ri" id="" name="select3">
            <?php for ($i=1;$i<31;$i++){ ?>
                <option  value="<?php echo $i;?>" ><?php echo $i;?></option>
            <?php   } ?>
            </select>

            </p>
        <p class="e-mail">电子邮件<input  id="email" class="e-mail-test" type="test"name="email"></p>

        <P class="yzm">Captcha<input class="yzm2" type="text" name='authcode' value=''/>
        <img  class="yzmimg" id="captcha_img" border='1' src='./captcha.php?r=echo rand(); ?>' />
      <a href="register.php" onclick="document.getElementById('captcha_img').src='captcha.php?r='+Math.random()">换一个?</a>
        </p>

          <input class="log" type="submit"name="submit" value="立即注册">

          <p class="change"><input id="change" type="checkbox" name="change" value="yes">我已阅读并同意相关服务条款和隐私政策
          </p>

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
  </body>


</html>
