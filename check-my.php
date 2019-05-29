<?php
include_once 'includes/global.func.php';
include_once 'conn.php';
session_start();
// var_dump($_SESSION['username']);
@$username=$_SESSION['username'];
//验证用户名格式
  if(isset($_POST['submit'])){
  @$first_pass=$_POST['first_pass'];
  @$second_pass=$_POST['second_pass'];
  @$reallyname=$_POST['reallyname'];
  @$sex=$_POST['sex'];
  @$email=$_POST['email'];
  @$reallybrithday=$_POST['reallybrithday'];
  @$face=$_POST['face'];
    if(strlen($reallyname)>16){
          _alert_back('真实姓名不合法');
        }
    if(preg_match('/^[0-9]*$/', $reallyname)){
              _alert_back('真实姓名不合法');
            }
  //验证密码格式
    if(strlen($first_pass) < 6){
      _alert_back('密码位数不得少于6位');
    }
    if($first_pass != $second_pass) {
    		_alert_back('两次密码输入不一致');
    	}
    if(!preg_match('/^[0-9]*$/', $reallybrithday)){
      _alert_back('出生日期格式错误');
    }
    if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $email)){
      _alert_back('电子邮箱格式错误');
   }
   if(isset($_REQUEST['authcode'])){
    //strtolower()小写函数
        if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){

    }else{
          _alert_back('验证码输入错误！');
          }
      }
//判断用户名是否被注册
   $sql = "UPDATE `register` SET password='{$first_pass}',
    reallyname='{$reallyname}',
    sex='{$sex}',
    reallybrithday='{$reallybrithday}',
     email='{$email}',
     face='{$face}'
    WHERE username='{$username}'";
    $result= mysql_query($sql);
  if($result){
      _alert_back('修改成功');
  }else{
       _alert_back('修改失败');
  }
}
