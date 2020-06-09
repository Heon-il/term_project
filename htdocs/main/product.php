<html>
<head>
<meta charset='utf-8'>

<script src="//code.jquery.com/jquery.min.js"></script>

</head>

<body>
<?php 
	//DB연결 
	include "dbconn.php";
	
		//product table에 입력된 것을 화면에 표시함
		$sql1 = "select *from product;";
		$result1 = mysql_query($sql1, $connect);
		$num1 = mysql_num_rows($result1);
		echo "<table width=100% height =100% border=1>
		<tr><th>상품명</th><th>가격</th><th>이미지</th><th>설명</th><th>주문하기</th></tr>";
			
			for($i=0;$i<$num1;$i++){
				mysql_data_seek($result1, $i);
				$row1 = mysql_fetch_array($result1);
				echo 
				"<tr>
				<td>$row1[pname]</td>
				<td>$row1[price]</td><td>
				<img src='$row1[image]' height='150px'/> </td>
				<td>$row1[contents]</td>
				<td> 
				<button><a href='order.php?pid=$row1[pid]'>주문하기</a></button>
				</td>
				</tr>";
		}
		echo "</table>";	
?>
</body>
</html>