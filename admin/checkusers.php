<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>留言板</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">
      .side table{margin: auto;margin-top: 20px;}
      .side table tr{
        float: left;
        margin-left: 50px;
        background-color: #CCC;
        width: 520px;
        height: 20px;
        margin-top: 2px;
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
         <li><a href="../login.php">登录</a></li>
         <li><a href="../register.php">注册</a></li>
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
            $id=$_GET['id'];
            $result=mysql_query("select*from register where id=$id");
            $row=mysql_fetch_array($result);
          ?>
          <table>
            <caption align="top">详细信息</caption>
            <tr><td>id: <?php echo $row['id']?></td></tr>
            <tr><td>姓名：<?php echo $row['username']?></td></tr>
            <tr><td>性别：<?php echo $row['sex']?></td></tr>
            <tr><td>邮箱：<?php echo $row['email']?></td></tr>
            <tr><td>密码：<?php echo $row['password']?></td></tr>
            <tr><td>真实姓名：<?php echo $row['reallyname']?></td></tr>
            <tr><td>生日：<?php echo $row['reallybrithday']?></td></tr>
            <tr><td>face：<?php echo $row['face']?></td></tr>
          </table>
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
