<?php
include ("conn.php");
$reply=$_POST['reply'] ;
$userid=$_POST['userid'];
$sonid=$_POST['sonid'];
$ruserid=$_POST['ruserid'];
$sql= "insert into message (userid,sonid,ruserid,reply,lastdate) values('$userid','$sonid','$ruserid','$reply',now())";
if (!mysql_query($sql)) {
   die ('Error: ' .mysql_error());
}
echo "<script>alert('回复成功！返回首页。');location.href='index.php';</script>";
mysql_close();
//$result=mysql_query("select * from 数据库名"，$link);
?>
<!--<?php
    $sqlo="select * from message";
    $query=mysql_query($sqlo);
    while($row=mysql_fetch_array($query)){?>
    <tr>
    <td><?php echo $row['reply'];?></td>
    </tr>
<?php } ?>-->