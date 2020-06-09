<html>
<head>
	<meta charset="utf-8">
</head>

<body>

	<?php
		$user_id = $_POST['user_id'];
		$user_pw = $_POST['user_pw'];
	
		//입력값이 없는 경우
		if(!$user_id||!$user_pw){
	
			echo "<script>alert('아이디와 비밀번호를 입력해주세요!'); history.go(-1);</script>";
			exit;
		}
	
		//아래 쿼리를 이용하기 위한 db연결
		include "dbconn.php";
		
		//ID,PW확인을 위한 쿼리문 작성
		$sql1="select*from USER where user_id='$user_id'";
		$result1 = mysql_query($sql1, $connect);
		$num1 = mysql_num_rows($result1);
		
		if($num1==0){
			echo "<script>window.alert('아이디가 존재하지 않습니다.'); history.go(-1);</script>";
			exit;
		}
		
		mysql_data_seek($result1, 0);
		$row1 = mysql_fetch_array($result1);

		if($row1[user_pw]!=$user_pw){
			echo "<script>window.alert('비밀번호가 틀립니다.'); history.go(-1);</script>";
			exit;
		}
		
		//주문조회
		
		
		$sql2="select *from order_table where id='$user_id';";
		$result2=mysql_query($sql2,$connect);
		
		
		echo "<fieldset><legend0><b>주문</b></legend>";
		
		echo "<table width=300 border=1><tr><th>주문번호</th><th>상품명</th><th>수량</th>";
		
		while($search_row= mysql_fetch_array($result2)){
			echo "<tr>
					<td>$search_row[order_no]</td>
					<td>$search_row[pname]</td>
					<td>$search_row[amount]</td>
				</tr>";
			echo "</br>";
		}
		echo "</table>";
		
	?>
		
		
		
		
		
</body>
</html>