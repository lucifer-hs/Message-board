<?php
include_once 'includes/global.func.php';
session_start();
if($_SESSION['username']==""){
  _alert_to('请通过正确途径登录');
}

 ?>
