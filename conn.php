<?php
$url="localhost";
$user="root";
$password="123456";
@$conn = mysql_connect($url,$user,$password);
mysql_query("set names 'utf-8'");
mysql_select_db("obdinms");
 ?>
