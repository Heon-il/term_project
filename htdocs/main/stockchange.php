<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript"></script>
</head>
<?php
	//고객이 주문할 때 전달 
	$pid=$_POST[pid];
	$stock=$_POST[stock];
	
	//재고 업데이트 처리
	include "dbconn.php";
	$sql="update product set stock=$stock where pid='$pid';";
	
	if(mysql_query($sql,$connect))
	{
		echo "<script>window.alert('재고를 변경하였습니다.'); history.go(-1);</script>";
		mysql_close();
		exit;
	}
	else
	{
		mysql_close();
		echo "<script>window.alert('재고변경을 실패하였습니다.'); history.go(-1); </script>";
		exit;
	}
?>
</html>