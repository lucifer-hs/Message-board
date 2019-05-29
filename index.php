<?php
include ("conn.php");
include ("fetch.php");
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
$face=$row['face'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>留言板</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script language="javascript">
 function CheckPost() {
 if (myform.biaoti.value.length<4)
 {
 alert("标题不能少于4个字符");
 myform.biaoti.focus();
 return false;
 }
 if (myform.content.value=="")
 {
 alert("内容不能为空");
 myform.content.focus();
 return false;
 }
 }

$(function(){
  $('.method').click(function(){
    //alert($(this).parents('.duiqi').prev().val());
    $zxy=$(this).parents('.duiqi').prev().val();
    $i=document.getElementById("ruserid0").value=$zxy;
    $i=document.getElementById("ruserid1").value=$zxy;
    //$('.xxx:eq(0)')
  })
})
</script>
  <body>
    <audio src="./mp3/PSY - Gentleman.mp3"controls="controls"autoplay="autoplay">
    </audio>
    <div class="container">
      <img  class="logo"src="images/2.png">
      <div class="header">
       <ul>
         <li><a href="#">首页</a></li>
         <?php if($username!='')
         echo "
         <li><a href=\"my.php\">个人中心</a></li>
          ";
          else{
            echo " <li><a href=\"notgo.php\">个人中心</a></li>";
          }
          ?>
         <?php

           if($username=='SVIP'){
             echo "
             <li><a href=\"admin/php1.php\">管理</a></li>
           ";
           }else{
             echo "";
           }
         ?>

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
        <div class="auto_" style="height: 50px;">
            <p style="font-size: 22px;padding-left:100px;padding-bottom: 20px;"><b><a href="index.php">浏览留言</a></b><span style="font-size: 16px;float: right;padding-right: 20px;">留言总数(<span style="color: red">
            <?php echo "$rows"; ?>
            </span>)</span></p>
            <hr size=1 style="width: 998px;">
        </div>
        <table width=1000 border="0" cellpadding="5" ellspacing="1" bgcolor="#add3ef">
        <?php $m=0; ?>
            <?php
            $sqli="SELECT * FROM image ORDER BY userid DESC LIMIT $rewsPerPage,$rowsPerPage";
            $query=mysql_query($sqli);
            while($row=mysql_fetch_assoc($query)) { ?>
            <div class="liu1" >
                <div class="liu2">
                    <div class="liu3">
                        <img src="<?php
                         $w=$row['username'];
                         $sqle=mysql_query("select * from register where username='$w'");
                         while($rw=mysql_fetch_array($sqle)){
                         echo $rw['face'];
                         }?>" width="100px" height="100px">
                    </div>
                    <div class="liu5">
                        <br>
                        <p align="center"><?php echo $row['username']; ?></p>
                    </div>
                </div>
                <div class="liu4">
                    <br>
                    <p align="center"><font color="red">标题：<?php echo $row['biaoti'];?></font></p>
                    <br>
                    <hr size=1 style="width: 850px;">
                    <br>
                    <div class="liu44">
                          <p><b><font color="blue">内容：<?php echo $row['content'];?></font></b></p>
                    </div>
                    <br>
                    <p align="right">时间：<?php echo $row['lastdate'];?></p>
                    <br>
                    <div  style="width: 820px;">
                          <form action="reply.php" method="post" class="form2" name="form2">
                              <div style="height: 155px;">
                              <?php
                              $q=$row['userid'];
                              $sql=mysql_query("select * from message where sonid=' $q'");
                              while($rs=mysql_fetch_array($sql)){
                              $aaa=$rs['userid'];
                              // $sss= $rs['ruserid'];
                               // var_dump($sss);
                              echo "<input style='border: 0px solid white;background-color: #f3f3f3' type='test' size='6' name='wocao' id='wocao' value='$aaa'>";
                              //echo $rs['userid'];
                              if ($row['userid']=$rs['sonid']) {
                                if ($row['username']!=$rs['ruserid']) {
                                  echo "<font color='red'>";
                                  echo "回复";
                                  echo "</font>";
                                  echo $rs['ruserid'];

                                  echo "：";
                                  echo $rs['reply'];
                                }else{
                                  echo "：";
                                  echo $rs['reply'];
                                  }
                              }
                              echo "<p class='duiqi'>";
                              echo $rs['lastdate'];
                              echo "<a href='javascript:;' class='method'  >回复</a>";
                              echo "</p>";
                              echo "<br>";
                              }
                              ?>
                              </div>
                              <input style="border: 0px solid white;background-color: #f3f3f3" size="8" type="button" value="<?php  echo "".$username.""; ?> ">
                              <input style="border: 0px solid white;background-color: #f3f3f3;display: none;" size="8" type="test" name="userid" id="userid" value="<?php  echo "".$username.""; ?> ">
                              <font color="red">回复</font>
                              <input style="border: 0px solid white;background-color: #f3f3f3" type="test" size="8" name="ruserid" id="ruserid<?php echo $m++; ?>" value="<?php echo $row['username'];?>">
                              <input type="text" name="sonid" id="sonid" size="1" value="<?php echo $row['userid']; ?>" style="display: none;">
                              <input type="text" name="reply"  style="width: 470px;height: 20px;">
                              <?php
                              if($username==''){}
                                else{
                                echo " <input type=\"submit\" name=\"submit\" value=\"发表\" />";
                                }
                                  ?>
                          </form>
                    </div>
                </div>
            </div>
            <br>
            <?php } ?>
        </table>
        <?php
            echo "<br>";
            if(isset($_GET['curPage']))
            {
                $curPage = $_GET['curPage'];
                $rewsPerPage=3*($curPage-1);
            }
            $sqli="SELECT * FROM image ORDER BY userid DESC LIMIT $rewsPerPage,$rowsPerPage";
            $query=mysql_query($sqli);
            echo "<div align = 'center'>";
            echo "<a href='index.php?curPage=1'>首页</a> ";
            for($i=1;$i<=$pages;$i++){
                echo "<a style='padding: 5px 5px' href='index.php?curPage=$i'>$i</a>";
            }
            echo "<a href = 'index.php?curPage=$pages'>尾页</a>";
            echo "</div>";
        ?>
         <div class="auto_">
            <form action="add.php" method="post" name="myform" class="form1">

            <?php if($username==''){

            }
            else{
              echo"  <b>用户：</b><input style=\"border: 0px solid white\" type=\"test\" name=\"username\" id=\"username\" value=\"$username\"><br><br>";
              echo"<b>标题：</b><input type=\"test\" name=\"biaoti\" id=\"biaoti\" /><br><br>";
              echo"<b>内容：</b><textarea style=\"width: 400px; height: 50px;\" name=\"content\" id=\"content\"></textarea>";
              echo"<input type=\"submit\" name=\"submit\" value=\"发布留言\" onclick=\"return CheckPost();\" />";
            }?>
            </form>
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
