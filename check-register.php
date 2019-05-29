<?php
include_once 'includes/global.func.php';
include_once 'conn.php';
//验证用户名格式
if(isset($_POST['submit'])){
  @$username=$_POST['username'];
  @$first_pass=$_POST['first_pass'];
  @$second_pass=$_POST['second_pass'];
  @$reallyname=$_POST['reallyname'];
  @$sex=$_POST['sex'];
  @$face=$_POST['face'];
  @$email=$_POST['email'];
  @$reallybrithday=$_POST['select1'] . "年"." ". $_POST["select2"]. "月"." ".$_POST["select3"]."日" ;
  @$change=$_POST['change'];
  if($change=="yes"){
       if($username==''){
         _alert_back('用户名不合法');
        }
      if(strlen($username)>24){
        _alert_back('用户名不合法');
        }
      if(strlen($reallyname)>16){
          _alert_back('真实姓名不合法');
        }
      if($reallyname==''){
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
      if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $email)){
            _alert_back('电子邮箱格式错误');
        }
         if(isset($_REQUEST['authcode'])){
          //strtolower()小写函数
          session_start();
              if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
    //判断用户名是否被注册
          $sql = mysql_query("select * from register where username='$username'");
          $result=mysql_num_rows($sql);
                  if($result > 0)
                    {
                        _alert_back('该用户名已经被注册!');
                    }
            }else{
                  _alert_back('验证码输入错误！');
                  }
              }
  }else{
              _alert_back('请你通过我们的协议');
            }
}
      $sql =  "insert into register (username,password,reallyname,sex,face,reallybrithday,email) values('$username','$first_pass','$reallyname','$sex','$face','$reallybrithday','$email')";
                  if (!mysql_query($sql,$conn)) {
                    die ('Error: ' .mysql_error());
                    }
                    _alert_to('注册成功');
                mysql_close($conn);
 ?>
