<html>
<head>
<meta charset='utf-8'>
<? include "dbconn.php";?>
</head>
<body>
	
	<!--admin page 비밀번호 설정 -->
	<script>
		password = prompt("비밀번호");
			if(password == 1111) {
			window.alert ("로그인 되었습니다.");
			} else {
			document.go(-1);
		}
	</script>


	<?php 
	//고객 정보
	echo "<fieldset><legend><b>가입 고객</b> </legend>";
	include "dbconn.php";

		$sql1 = "select user_name,user_id,phone_num from  user";
		$result1 = mysql_query($sql1, $connect);
		$num1 = mysql_num_rows($result1);
		echo "<table width='200' border=1><tr><th colspan='4'> 가입 고객명단 </th></tr>
			<tr>
			<th>name</th>
			<th>id</th>
			<th>phone_num</th>
			</tr>";
			
			for($i=0;$i<$num1;$i++){
				mysql_data_seek($result1, $i);
				$row1 = mysql_fetch_array($result1);
				echo "<tr>
						<td>$row1[user_name]</td>
						<td>$row1[user_id]</td>
						<td>$row1[phone_num]</td>
					</tr>";
		}
		echo "</table>";
	echo "</fieldset>";

		//주문 테이블 
		echo "<fieldset><legend>주문</legend>";
	
		$order_sql = "select *from order_table order by order_no desc;";
		$order_result = mysql_query($order_sql, $connect);
		
		echo "
		<table width=100% border=1>
		<tr><th>주문번호</th>
		<th>주문일</th>
		<th>주문 시간</th>
		<th>ID</th>
		<th>이름</th>
		<th>상품관리코드</th>
		<th>상품명</th>
		<th>수량</th>
		<th>배송지 주소</th>
		<th>배송 메시지</th>
		<th>매출</th></tr>";
		
			while($order_row=mysql_fetch_row($order_result)){
				echo "<tr>
						<td>$order_row[0]</td>
						<td>$order_row[1]</td>
						<td>$order_row[2]</td>
						<td>$order_row[3]</td>
						<td>$order_row[4]</td>
						<td>$order_row[5]</td>
						<td>$order_row[6]</td>
						<td>$order_row[7]</td>
						<td>$order_row[8]</td>
						<td>$order_row[9]</td>
						<td>$order_row[10]</td>
					</tr>";
				echo "</br>";
			}
		echo "</table>";
	?> </fieldset>
	
	
	<!-- 재고 관리-->
	<fieldset> <legend> 재고 관리</legend>
		<div>
			<a href="product_add.php"> 상품 등록하기</a></li><!-- 상품 등록 페이지로 이동-->
		</div>
	
		<?php 
			//재고 수량 보기
			$pid_sql="select pid,pname,stock from product order by pid asc;";
			$pid_result=mysql_query($pid_sql,$connect);
			
			echo "<table width=300 border=1><tr><th>상품관리코드</th><th>상품명</th><th>재고</th></tr>";
		
				while($pid_row=mysql_fetch_row($pid_result)){
					echo "<tr>
							<td><option>$pid_row[0]</option></td>
							<td><option>$pid_row[1]</option></td>
							<td><option>$pid_row[2]</option></td>
						</tr>";
					echo "</br>";
					}
				echo "</table>";
				
			?>
			
		<!-- 재고 업데이트 -->
		<form action="stockchange.php" name="stock_change" method="POST" >			
			<table>
			<tr>
				<td><b>상품관리코드</b></td>
				<td>
				<select size="1" name="pid" style="width: 100px">
				<?php
					include "dbconn.php";
					$pid_sql2="select pid,pname,stock from product order by pid asc;";
					$pid_result2=mysql_query($pid_sql2,$connect);
					while($pid_row2=mysql_fetch_row($pid_result2))
					{
						echo "<option>$pid_row2[0]</option>";
					}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td><b>수량</b></td>
				<td><input type="number" name="stock"> </td>
				<td> <input type="submit" value="재고 변경하기"></td>
			</tr>
			</table>
		</form>
	</fieldset>
	
	<!--통계 관리-->
	<fieldset>
		<legend><b>통계 관리</b></legend>
		
		<?php
		include "dbconn.php";
		
		//일별 매출 구하기
			$day_revenue_sql="select date,sum(revenue) from order_table group by date;";
			$day_revenue_result=mysql_query($day_revenue_sql,$connect);
			
		echo "<table width=300 border=1><tr><th colspan='2'><b>일별매출</b></th></tr>
		<tr><th>날짜</th><th>매출(합)</th></tr>";
			while($day_revenue_row=mysql_fetch_row($day_revenue_result)){
				echo "<tr>
						<td>$day_revenue_row[0]</td>
						<td>$day_revenue_row[1]</td>
					</tr>";
				
				echo "</br>";
			}
		echo "</table>";
		
		
		//상품별 매출 구하기
			$pid_revenue_sql="select pid,pname, sum(revenue) from order_table group by pid;";
			$pid_revenue_result=mysql_query($pid_revenue_sql,$connect);
		
		echo "<table width=450 border=1><tr><th colspan='3'><b>상품별 매출</b></th></tr>
		<tr><th>상품관리코드</th><th>상품명</th><th>매출(합)</th></tr>";
			while($pid_revenue_row=mysql_fetch_row($pid_revenue_result)){
				echo "<tr>
						<td>$pid_revenue_row[0]</td>
						<td>$pid_revenue_row[1]</td>
						<td>$pid_revenue_row[2]</td>
					</tr>";
				echo "</br>";
			}
		echo "</table>";
		?>
	</fieldset>
</body>
</html>