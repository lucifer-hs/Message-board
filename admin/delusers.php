<?php
	include "conn.php";
    $id = $_GET['id'];
    $username=$_GET['username'];
    if ($id!=0) {
    	$query="delete from register where id='$id'";
        $queryl="delete from image where username='$username'";
    	mysql_query($query);
        mysql_query($queryl);
	}else{
		$query="delete from register";
        $queryl="delete from image";
    	mysql_query($query);
        mysql_query($queryl);
	}
    $page="php2.php";
    echo "<script>alert('删除用户成功');window.location = \"".$page."\";</script>"; 
?>