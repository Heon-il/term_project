<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
<script src="http://code.jquery.com/jquery-latest.js"></script>

<?
	include "dbconn.php";
?>

<script type="text/javascript">
</script>
</head>
<body>
	<!-- 회원가입 폼 입력 register2.php로 보내서 가입 처리-->
	<form  action="register2.php" name="register_form" method="post" style="margin-top:10px;">
		<fieldset>
			<legend>회원가입</legend>
			<table width="280" height="220">

				<!-- membership number -->
				<tr>
					<td><b> 아이디 </b></td>
					<td><input type="text" name="user_id"></td>
				</tr>
				<tr>
				
				<tr>
					<td><b> 비밀번호 </b></td>
					<td><input type="password" name="user_pw"></td>
				</tr>
		

				<!-- client name-->
				<tr>
					<td><b>이름 </b></td>
					<td><input type="text" name="user_name"></td>
				</tr>
				
				<tr>
					<td><b> 휴대전화번호 </b></td>
					<td><input type="text" name="phone_num"></td>
				</tr>
				
				
				<!--제출 버튼-->
				<tr>
					<td><center><input type="submit"></center></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>