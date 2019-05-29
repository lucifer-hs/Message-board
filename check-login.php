<?php
  //设置头部信息
session_start();
include_once 'includes/global.func.php';
include_once 'conn.php';
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //用户，密码 格式判断
  if(strlen($username)>12){
      _alert_back('用户名不合法');
    }
  if(strlen($password) < 6){
    _alert_back('密码位数不得少于6位');
  }
   //isset()检测变量是否设置
   if(isset($_REQUEST['authcode'])){
     //strtolower()小写函数
     if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
       //跳转页面
       $sql = mysql_query("select *from register where username='$username'");
       $result=mysql_num_rows($sql);
       if($result <= 0)
       {
         _alert_back('该用户名不存在!');
       }
     }else{
       //提示以及跳转页面
       _alert_back('验证码输入错误！');
      }
      }
       $sql = mysql_query("select *from register where username='$username' and password='$password'");
      @$result=mysql_num_rows($sql);
       if($result==1)
       {
         $_SESSION["username"]=$_POST['username'];
         _alert_go('登录成功!');
      }
      // else {
      //    _alert_back('登录失败！');
      //  }
      var_dump($username);
      echo mysql_error();


}

?>
