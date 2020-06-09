<html>
<head>
<meta charset='utf-8'>
</head>

	<body>
		<!-- 로그인 폼 생성 login_checking.php에서 입력된 값 바탕으로 처리-->
		<form name="login_form" method='POST' action="login_checking.php">
		<fieldset>
			<legend> 로그인 </legend>
			<table width="280" height="220">
				<tr>
					<td><b>ID </b><td>
					<td><input type="text" name="user_id"></td>
				</tr>
				<tr>
					<td><b>PASSWORD</b><td>
					<td><input type="password" name="user_pw"></td>
				</tr>
				
				<tr>
					<td><center><input type="submit"></center></td>
				</tr>
			</table>
			</fieldset>
		</form>
		
	<fieldset>
	<table width=150 border=1>
        <a href="register.php">회원가입하러 가기</a></li> <!-- 회원가입 페이지로 연결-->
	</table>
	</fieldset>
	</body>
</html>