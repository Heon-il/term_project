<!--제품 추가 처리-->
<html>
<head>
     <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">

</head>

<?php 
	
	ini_set("display_errors", 1);

	
	$pid = $_POST[pid];
	$pname = $_POST[pname];
    $price = $_POST[price];
	$contents = $_POST[contents];
	$stock=$_POST[stock];
	
	
	//empty check
	if(!$pid||!$pname||!$price){
    	echo "<script>window.alert('모두 입력해주세요'); history.go(-1);</script>";
    	exit;
    }

		include "dbconn.php";
			
		//상품관리 코드 중복 확인
		$sql1 = "select*from product where pid='$pid'";
		$result1 = mysql_query($sql1,$connect);
		$num1 = mysql_num_rows($result1);

		if($num1>0){
			echo "<script>window.alert('이미 존재하는 상품관리코드 입니다.'); history.go(-1);</script>";
			exit;
		}
	
	
		$uploaddir = 'C:/Users/hunwo/APM_Setup/htdocs/upload\\'; //이미지 업로드 저장 장소
		$uploadfile = $uploaddir.basename($_FILES['image_file']['name']);


		//이미지 upload
		if(move_uploaded_file($_FILES['image_file']['tmp_name'],$uploadfile)){
			
			echo "사진 파일이 유효합니다.";
			
			}
			/*move_uploaded_file($filename, $destination) --> return T/F
			서버로 전송된 파일을 저장할 때 사용하는 함수 */
			
			else {
				print "<script>window.alert('사진 파일이 유효하지 않습니다.');history.go(-1);</script>";
				exit; 
			}
		
			//mysql이 "\"을 인코딩 하지 못해 저장경로를 uploadfile로 하지 않고 직접 따로 지정
			$upload_at="http://localhost/upload/".$_FILES['image_file']['name'];
			
			//db에 데이터 삽입
			$sql2 = "insert into product (pid,pname,price,contents,image,stock)
			values ('$pid','$pname','$price','$contents','$upload_at','$stock');";
			mysql_query($sql2,$connect);

			mysql_close();

			echo "<script>alert('상품등록이 완료 되었습니다.'); window.close();</script>";
?>

			<script> location.href="main.php";</script>

</html>