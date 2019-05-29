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
    	.side table tr{
    		width: 585px;
    		height: 20px;
    		background-color: #fff;
    		float: left;
    		margin-left: 50px;
    		text-align: center;
    	}
    	.side table tr td{
    		width: 100px;
    		height: 20px;
    		background-color: #CCC;
    		float: left;
    		margin: 1px;
    	}
    	.side table tr th{
    		width: 100px;
    		height: 20px;
    		background-color: #868181;
    		float: left;
    		margin: 1px;
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
          	echo "查看用户";
          	$result=mysql_query("SELECT*from register");
		  	echo "<table border='1'>
			<tr>
				<th>name</th>
				<th>sex</th>
				<th>email</th>
				<th>password</th>
				<th>查看</th>
			</tr>";

			while($row = mysql_fetch_array($result))
 			{
			    echo "<tr>";
  				echo "<td>" . $row['username'] . "</td>";
  				echo "<td>" . $row['sex'] . "</td>";
  				echo "<td>" . $row['email'] . "</td>";
  				echo "<td>" . $row['password'] . "</td>";
          $id=$row['id'];
  				echo "<td>" . "<a href='checkusers.php?id=$id'>查看</a>". "</td>";
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
