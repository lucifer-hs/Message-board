<?php
include 'conn.php';
    $userid = $_GET['userid'];
    $query="delete from image where userid=".$userid;
    mysql_query($query);
?>
<?php
//页面跳转，实现方式为javascript 
$url = "index.php";
echo "<script>";
echo "window.location.href='$url'";
echo "</script>";
//使用js页面跳转回list查看文件的页面
?> 
