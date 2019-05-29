<?php
	include "conn.php";
    $id = $_GET['userid'];
    	$query="delete from image where userid=".$id;
    	mysql_query($query);
    $page="my.php";
    echo "<script>alert('删除留言成功');window.location = \"".$page."\";</script>"; 
?>