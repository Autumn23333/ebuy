<?php
	#get connection
	$con=mysqli_connect('127.0.0.1','root','mysql','ebuy');
	if(!$con)
		die('Cannot connect database:'.mysqli_error());
	else
		echo 'Connected';
	echo '<br>';

	#get user cart information
	$subtotal = empty($_POST["subtotal"])?null:$_POST["subtotal"];
	$type = empty($_POST["type"])?null:$_POST["type"];
	

	$user_id = empty($_GET["user_id"])?null:$_GET["user_id"];
	$type_id = empty($_GET["type_id"])?null:$_GET["type_id"];
	if($subtotal)
		$action="check";
	else
		$action="delete";

	#delete items
	if($action=="delete")
	{
		$query="delete from cart where user_id=".$user_id." and type_id=".$type_id;	
	$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));
	#check if register successfully
		if($result)
		{
			echo "<script language='javascript'>;alert('delete successfully');</script>";
	#head to the main page
			echo "<script language='javascript'>;window.location.href='cart.php';</script>";
		}

	}
	#check out
	if($action=="check")
	{
		$query="delete from cart where user_id=".$_COOKIE["user"];
		
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));

		$query="select address,phone from user where user_id=".$_COOKIE["user"];
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));
		$row=mysqli_fetch_row($result);
		$address=$row[0][0];
		$contact=$row[0][1];

	#check if storage>0
		$query="select storage from category where type_id=".$type;
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));
		$row=mysqli_fetch_row($result);
		$storage=$row[0][0];
		if($storage>0)
		{
			#insert an order into user_order table
		$query="insert into user_order values(null, now(), '', ".$_COOKIE["user"].", "."'".$address."'".",".$contact.","."15213, "."'train'".", "."date_add(now(), interval 1 day)) ";
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));

		$subquery="select order_id from user_order where user_id=".$_COOKIE["user"]." order by order_date DESC limit 1";
		// $query="insert into stock_out values(null, ".$type.","."1, "."now(), "."(".$subquery.")";
		// echo $query;
		// $result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));


	#insert relevant record into order_category table
		$subquery="select order_id from user_order where user_id=".$_COOKIE["user"]." order by order_date DESC limit 1";
		$query="insert into order_category values((".$subquery.")".",".$type.","."1".")";
	
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));

	#updata storage in category table
		$query="update category set storage=storage-1 where type_id=".$type;
		echo $query;
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));


		
		echo "<script language='javascript'>;alert('total price is:$subtotal');</script>";
		echo "<script language='javascript'>;window.location.href='payment.php';</script>";

		}
	else
		{
			
			echo "<script language='javascript'>;alert('item sold out!');</script>";
			echo "<script language='javascript'>;window.location.href='mainpage.php';</script>";

		}
		

	}

?>