<!--admin.php에서 연결된 상품등록-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
<title>상품 등록 페이지 </title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
	<!-- 재품 추가 폼 입력 -->
	<!-- product_add_post.php로 post형식으로 보내서 처리 -->
	<!-- 사진 upload때문에 enctype="multipart/form-date 필수!"-->
	<form action="product_add_post.php" name="p_form" method="post" enctype="multipart/form-data">
		<fieldset>
		<table width=100% border=1>
			<tr>
				<td>상품관리코드</td>
				<td><input type="text" name="pid"></td>
			</tr>
			
			<tr>
				<td>상품명</td>
				<td><input type="text" name="pname"></td>
			</tr>
			
			<tr>
				<td>금액</td>
				<td><input type="text" name="price"></td>
			</tr>
			
			<tr>
				<td>설명</td>
				<td><textarea rows="10" cols="30" name="contents"></textarea>
			</tr>
			
			<tr>
				<td>사진</td>
				<td><input type="file" name="image_file" > </td>
			</tr>
			
			<tr>
				<td>재고</td>
				<td><input type="text" name="stock" > </td>
			</tr>
			
			<tr>
				<td><center><input type="submit" value="등록"></center></td>
			</tr>
		</table>
		</fieldset>
	</form>
	
</body>
</html>