<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<?php
	$pid=$_POST['pid'];
	$user_id=$_POST['user_id'];
	$user_pw=$_POST['user_pw'];
	$order_amount=$_POST['amount'];
	$dest=$_POST['dest'];
	$order_mesg=$_POST['order_mesg'];
	
	
	$order_no=date("YmdHis");	//주문 번호 생성 - order_table의 primary key
	$order_date=date("Y-m-d");  // order_table에 들어갈 date
	$order_time=date("H:i:s"); 	// order_table에 들어갈 time
	
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

    if($row1[password]!=$password){
        echo "<script>window.alert('비밀번호가 틀립니다.'); history.go(-1);</script>";
        exit;
    }
	
	
	//재고확인
	$stock_sql="select stock from product where pid=$pid;";
	$stock_result=mysql_query($stock_sql,$connect);
	mysql_data_seek($stock_result,0);
	$stock = mysql_fetch_array($stock_result);
	$stock_num=$stock[stock];
	
	
	//수량이 재고를 넘었을 경우 재고가 몇개인지 알려줌
	if($order_amount>$stock_num)
	{
		echo "<script>window.alert('수량을' + ' ' + $stock[stock]+'개 이하로 적어주세요.'); history.go(-1); </script>";
		exit;
	}	
	
	//post로 받은 user_id로부터 name을 가져오기 위해
	$name_sql="select user_name from user where user_id='$user_id';";
	$name_result=mysql_query($name_sql,$connect);
	mysql_data_seek($name_result,0);
	$name_row=mysql_fetch_array($name_result);
	$name=$name_row[user_name];
	
	//post로 받은 pid로부터 pname을 가져오기 위해
	$pname_sql="select pname from product where pid='$pid';";
	$pname_result=mysql_query($pname_sql,$connect);
	mysql_data_seek($pname_result,0);
	$pname_row=mysql_fetch_array($pname_result);
	$pname=$pname_row[pname];
	
	//revenue 계산을 위해서 price를 가져오고 amount랑 곱한다
	$price_sql="select price from product where pid='$pid';";
	$price_result=mysql_query($price_sql,$connect);
	mysql_data_seek($price_result,0);
	$price_row=mysql_fetch_array($price_result);
	$price=$price_row[price];

	$revenue=$order_amount * $price;
	

	//Order_table 업데이트
	$table_update_sql=
	"insert into order_table 
	(order_no,date,time,id,name,pid,pname,amount,dest,order_mesg,revenue)
	values 
	('$order_no','$order_date','$order_time','$user_id',
	'$name','$pid','$pname','$order_amount','$dest','$order_mesg','$revenue');
	";
	
	//위 쿼리문이 성공하였다면 재고를 업데이트 해줘야 함.
	if(mysql_query($table_update_sql,$connect))
	{
		echo "<script>window.alert('주문에 성공하였습니다.');</script>";		
		//주문 성공 여부 
		
		$new_stock = $stock_num-$order_amount;
		
		$update_stock="update product set stock=$new_stock where pid='$pid';";
		
		if(mysql_query ($update_stock,$connect))
		{
				echo "재고 업데이트 성공";
				
				
		}
		else {
			echo "재고 업데이트 실패";
		}
		mysql_close();
	}
	
	else {
		
		echo "<script>window.alert('주문에 실패하였습니다. 관리자에게 연락해주세요.'); history.go(-1); </script>";		
		mysql_close();
		exit;
	}
	
	?>

</body>
</html>
