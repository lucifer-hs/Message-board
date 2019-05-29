<?php
session_start();
@$username=$_SESSION['username'];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>留言板</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">
      .side table tr td{
        float: left;
        margin-left: 50px;
        margin-top: -2px;
        background-color: #868181;
        width: 520px;
        height: 25px;
        line-height: 25px;
        color: white;
      }
      .side .aa{
        background-color: #CCC;
        height: 100px;
        color: black;
      }
      .side p{
        position: absolute;
        background-color: white;
        width: 640px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img  class="logo"src="images/2.png">
      <div class="header">
       <ul>
         <li><a href="../index.php">首页</a></li>
         <li><a href="../my.php">个人中心</a></li>
         <li><a href="#">管理</a></li>
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
        <div class="navbar_n">
          <img src="images/a.jpg" style="height: 200px;">
        </div>
        <div class="menu">
          <span class="title">留言系统管理</span>
          <ul class="ul1">
            <li style="background-color: #868181;">用户管理</li>
            <a href="php1.php"><li>查看用户</li></a>
            <a href="php2.php"><li>删除用户</li></a>
            <a href="php3.php"><li>留言管理</li></a>
          </ul>
        </div>
        <div class="side">
          <?php
            include "conn.php";
            $result=mysql_query("select*from image order by userid desc");
            //mysql_query("INSERT INTO image (userid,username,biaoti,content,lastdate) VALUES(null,'yanzhenying','aa','aaaaa',now())");
            echo "<table>";
            echo "<p>";
            echo "留言管理(总留言条数：".mysql_num_rows($result).")";
            echo "<form method='post' action='checkliuyan.php'>
                    <input type='text' name='check' value='输入姓名' style='float:left;margin:10px 10px;'>
                    <input type='submit' value='查找' style='margin-top:10px;'>
                  </form>";
            echo "<a href='delliuyan.php?userid=0' style='float: right;margin-right: 50px;margin-top:10px;'>删除所有留言</a>";
            echo "</p>";
            while($row=mysql_fetch_array($result))
            {
              $id=$row['userid'];
              echo "<tr>";
              echo "<td style='margin-top: 60px;'>用户：".$row['username']." || 标题：".$row['biaoti']."<a href='delliuyan.php?userid=$id' style='float: right;'>删除留言</a>"."</td>";
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
