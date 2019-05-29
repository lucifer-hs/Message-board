<?php
	$rewsPerPage=0;
	$rowsPerPage=2;   //每页的行数  
    $qqq= mysql_query("SELECT count(*) AS c FROM image");
    $row = mysql_fetch_assoc($qqq);
    //查询表中的总记录数 
    $rows = $row['c'];  //得到表中总记录数 
    $pages = ceil($rows / $rowsPerPage);  //页数   
    $curPage = 1;   //当前要显示第1页，默认显示第1页  
    if(isset($_GET['curPage']))//如果用户提交了指定的页数
    {
    	$curPage = $_GET['curPage'];   // 就将这个页数设定为用户指定的值 
    	$rewsPerPage=2*($curPage-1);
	}
    //$sqli="SELECT * FROM image ORDER BY userid DESC LIMIT $rewsPerPage,$rowsPerPage";
    //$query=mysql_query($sqli);
?>
