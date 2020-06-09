<html>
<head>
	<meta charset="utf-8">
	<script src="//code.jquery.com/jquery.min.js"></script>
</head>

<body>
	<!--get_pid값을 javacript변수로 전달-->
	<?php $pid = $_GET['pid']; ?>
	<script>
		var pid= '<?= $pid ?>';
		$(document).ready(function(){
			$('#pid').val(pid)}); // input hidden값에 pid를 부여
	</script>

	<!--주문관련 입력값-->
	<form  action="order2.php" name="order_form" method="POST" style="margin-top:10px;">
	
		<input type="hidden" id="pid"  name = "pid"/><!--주문하기 클릭 후 받은 제품관리코드 값을 hidden으로 보내줌-->

		<fieldset> 
		<legend>주문정보</legend>
		<table width="280" height="220">
			<tr>
				<td><b>아이디</b></td>
				<td><input type="text" name="user_id"></td>
			</tr>
			<tr>
				<td><b> 비밀번호 </b></td>
				<td><input type="password" name="user_pw"></td>
			</tr>
			<tr>
				<td><b> 수량 </b></td>
				<td><input type="number" name="amount"></td>
			</tr>
			<tr>
				<td><b> 배송지 </b></td>
				<td><input type="text" name="dest"></td>
			</tr>
			<tr>
				<td><b> 배송메시지 </b></td>
				<td><input type="text" name="order_mesg"></td>
			</tr>		
		</table>
	</fieldset>
	<nav>
		<center><input type="submit" value="주문하기"></center>
	</nav>
</form>
</body>
</html>