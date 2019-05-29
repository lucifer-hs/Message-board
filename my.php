<?php
include_once 'conn.php';
session_start();
@$username=$_SESSION['username'];
if(@$_GET['action'] == "logout"){
    unset($_SESSION['username']);
    header("location:index.php");
  }else {

  }
$sql = "SELECT * FROM register info where username='$username'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

$username=$row['username'];
$reallyname=$row['reallyname'];
$sex=$row['sex'];
$reallybrithday=$row['reallybrithday'];
$email=$row['email'];
$password=$row['password'];
$face=$row['face'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>留言板</title>
    <link rel="stylesheet" type="text/css" href="css/my.css">
    <script type="text/javascript" src="js/script.js"></script>
    <!-- <script type="text/javascript" src="js/face.js"></script> -->
    <style type="text/css">

      .mod table tr td{
        margin: auto;
        background-color: #868181;
        width: 520px;
        height: 25px;
        line-height: 25px;
        color: white;
      }
      .mod .aa{
        background-color: #CCC;
        height: 100px;
        color: black;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img  class="logo"src="images/2.png">
      <div class="header">
       <ul>
         <li><a href="index.php">首页</a></li>
         <li><a href="#">个人中心</a></li>
          <?php

            if($username==''){
              echo "
              <li><a href='login.php'>登录</a> </li>
              <li><a href='register.php'>注册</a></li>
              ";
            }else{
              echo "
              <li><a href='my.php'>".$username."</a></li>
              <li><a href=\"index.php?action=logout\">注销</a></li>
              ";
            }
          ?>
       </ul>
      </div>

      <div class="main">
        <div class="main_top">
            <img src="images/111.jpg" style="height: 200px;width: 970px;">
        </div>
        <div class="meau">
          <p class="meau_p1">导航列表</p>
          <p class="meau_p2">会员管理中心</p>
        </div>
        <div  id="notice" class="notice">
          <div id="notice-tit" class="notice-tit">
            <ul>
              <li id="0" class="select"><a  href="#">账号管理</a></li>
              <li id="1"><a  href="#">个人资料</a></li>
              <li id="2"><a  href="#">更改资料</a></li>
              <li id="3"><a  href="#">查看留言</a></li>
              <li id="4" ><a  href="#">未完待续</a></li>
            </ul>
          </div>
          <div id="notice-con" class="notice-con">
            <div class="mod"style="display:block;">
              <ul>
                <li class="welcome"> 欢迎<?php echo $username; ?>
                  <?php
                  if($sex=0){
                    echo "女士";
                  }else{
                    echo "先生";
                  }?>
                  来到此系统

                </li>
              </ul>
          </div>
          <div class="mod"style="display:none;">
            <ul class="first_mod">

             <li>用户名：<?php echo $username; ?></li>
             <li>真实姓名：<?php echo $reallyname; ?></li>
             <li>性别：<?php
             if($sex=0){
               echo "女";
             }else{
               echo "男";
             }
               ?></li>
               <li class="imgstyles_1"><span class="imgstyles">头像:</span>
               <img src="<?php echo $face;?> "class="imgstyle"></li>
             <li>出生日期：<?php echo $reallybrithday; ?></li>
             <li>电子邮件：<?php echo $email; ?></li>
            </ul>
        </div>
        <div class="mod"style="display:none;">
          <ul class="first_mod">
           <form action="check-my.php"method="post">
           <li>用户名：<?php echo $username; ?></li>
           <li>密码：<input   class="passtest1" type="password" name="first_pass" value="<?php echo $password; ?>"></li>
           <li>重复密码：<input  class="passtest2" type="password" name="second_pass" value="<?php echo $password; ?>"></li>
           <li>真实姓名：<input  class="reallyname" type="test" name="reallyname" value="<?php echo $reallyname; ?>"></li>
           <li>性别：<input  class="radio1" name="sex" type="radio" value="1"checked>男
             <input class="radio1" name="sex" type="radio" value="0">女
           </li>
           <li class="imgstyles_1"><span class="imgstyles">头像:
          <input type="hidden" name="face" value="<?php echo $face;?>" id="imgip" />
          <img src="<?php echo $face;?>" alt="头像选择" id="faceimg" class="imgstyle2"></li></li>

          <li class="brithday">出生日期
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

        </li>

           <li>电子邮件：<input  id="email" class="e-mail-test" type="test" name="email" value="<?php echo $email; ?>"></li>
           <li class="yzm">Captcha<input class="yzm2" type="text" name='authcode' value=''/>
           <img  class="yzmimg"id="captcha_img" border='1' src='./captcha.php?r=echo rand(); ?>' />
         <a href="register.php" onclick="document.getElementById('captcha_img').src='captcha.php?r='+Math.random()">换一个?</a>
       </li>
                 <input class="log" type="submit" name="submit" value="立即修改">
          </ul>
        </form>
      </div>
      <div class="mod" style="display:none;">
        <?php
            include "conn.php";
            $result=mysql_query("select*from image where username='$username' order by userid desc");
            //mysql_query("INSERT INTO image (userid,username,biaoti,content,lastdate) VALUES(null,'营','aa','aaaaa',now())");
            //echo "总留言数：".mysql_num_rows("$result");
            echo "<table>";

            while($row=mysql_fetch_array($result))
            {
              $id=$row['userid'];
              echo "<tr>";
              echo "<td style='margin-top: 30px;'>"." 标题：".$row['biaoti']."<a href='delliuyan.php?userid=$id' style='float: right;'>删除留言</a>"."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td class='aa'>".$row['content']."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td style='float: right;'>留言时间：".$row['lastdate']."</td>";
              echo "</tr>";
            }
            echo "</table>";
          ?>
    </div>
    <div class="mod"style="display:none;">
      <ul>

      </ul>
  </div>
        </div>
      </div>
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
