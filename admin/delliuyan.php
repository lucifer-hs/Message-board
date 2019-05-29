<?php
	include "conn.php";
    $id = $_GET['userid'];
    if ($id!=0) {
    	$query="delete from image where userid=".$id;
    	mysql_query($query);
	}else{
		$query="delete from image";
    	mysql_query($query);
	}
    $page="php3.php";
    echo "<script>alert('删除留言成功');window.location = \"".$page."\";</script>"; 
?>