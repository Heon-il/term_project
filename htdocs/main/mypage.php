<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
	<script type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
	<!-- 주문조회를 위한 id.pw입력-->
	<form action="mypage2.php" name="mypage_form" method="POST" style="margin-top:10px;">	
	
		<fieldset> 
			<legend>주문 조회</legend>
			<table width="280" height="220">
				<tr>
					<td><b>아이디</b></td>
					<td><input type="text" name="user_id"></td>
				</tr>
				<tr>
					<td><b> 비밀번호 </b></td>
					<td><input type="password" name="user_pw"></td>
				</tr>
			</table>
		</fieldset>
		<center><input type="submit" value="조회하기"></center>
	</form>
	
</body>
</html>

