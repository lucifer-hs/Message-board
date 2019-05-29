<?php
include ("conn.php");
$username=$_POST['username'];
$biaoti=$_POST['biaoti'] ;
$content=$_POST['content'] ;
/*$url="localhost";
$user="root";
$password="123456";
@mysql_connect($url,$user,$password);
mysql_query("set names 'utf8'");
mysql_select_db("login");*/
$sql =  "insert into image (username,biaoti,content,lastdate) values('$username','$biaoti','$content',now())";
if (!mysql_query($sql)) {
   die ('Error: ' .mysql_error());
}
echo "<script>alert('提交成功！返回首页。');location.href='index.php';</script>";
mysql_close();
 ?>
