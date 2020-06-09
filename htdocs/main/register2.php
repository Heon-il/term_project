<html>
<head>
     <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
</head>

<?php
    //for registering client
    $user_id = $_POST[user_id];
	$user_pw = $_POST[user_pw];
    $user_name = $_POST[user_name];
    $phone_num = $_POST[phone_num];
    
	//check empty
    if(!$user_id||!$user_pw||!$user_name||!$phone_num){
    	echo "<script>window.alert('빈 칸을 모두 입력해주세요.'); history.go(-1);</script>";
    	exit;
    }
	
    include "dbconn.php";

    //check duplication
    $sql1 = "select * from user where user_id='$user_id'";
    $result1 = mysql_query($sql1, $connect);
    $num1 = mysql_num_rows($result1);

    if($num1>0){
        echo "<script>window.alert('이미 존재하는 아이디입니다.'); history.go(-1);</script>";
        exit;
    }

    //insert client
    $sql2 = "insert into user
	(user_id, user_pw, user_name, phone_num) values
	('$user_id', '$user_pw', '$user_name','$phone_num')";
    mysql_query($sql2,$connect);

    mysql_close();

    echo "<script>alert('$user_name님 등록되었습니다.'); window.close();</script>";
?>

	<script> location.href="main.php";</script> <!-- 회원가입 성공시 main page로 이동-->
</html>