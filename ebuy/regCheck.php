<?php
	#get connection
	$con=mysqli_connect('127.0.0.1','root','mysql','ebuy');
	if(!$con)
		die('Cannot connect database:'.mysqli_error());
	else
		echo 'Connected';
	echo '<br>';

	#get user login information
	$username = empty($_POST["username"])?null:$_POST["username"];
	$password = empty($_POST["password"])?null:$_POST["password"];
	$firstname = empty($_POST["firstname"])?null:$_POST["firstname"];
	$lastname = empty($_POST["lastname"])?null:$_POST["lastname"];
	$phone = empty($_POST["phone"])?null:$_POST["phone"];
	$email = empty($_POST["email"])?null:$_POST["email"];
	$gender = empty($_POST["genderm"])?null:$_POST["genderm"];
	$address = empty($_POST["address"])?null:$_POST["address"];
	$result=null;


	#insert relevant user info from database
	$query="insert into user values (null," ."'".$firstname."'".","."'".$lastname."'".","
	."'".$password."'".","."'".$username."'".","."'".$phone."'".","."'".$email."'".","."now()".","."'".$gender."'".","."'".$address."'".","."null".")";
	if($username&&$password&&$firstname&&$lastname&&$phone&&$email&&$gender&&$address)
		$result=mysqli_query($con,$query) or die('Error:'.mysqli_error($con));
	#check if register successfully
		if($result)
		{
			echo "<script language='javascript'>;alert('register successfully');</script>";
	#head to the main page
			echo "<script language='javascript'>;window.location.href='reg.html';</script>";
		}
		else 
		{
			echo "<script language='javascript'>;alert('register failed, please input all fields');</script>";
	#head to the register page
			echo "<script language='javascript'>;window.location.href='login.html';</script>";
		}

?>