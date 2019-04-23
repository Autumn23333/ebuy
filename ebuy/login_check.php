<html>
	<head>
		<title>
			
		</title>
	</head>
<?php
	$is_logged="";
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

	#retrieve relevant user info from database and prevent sql injection
	$stmt= $con->prepare('SELECT password , user_id FROM user WHERE user_name = ?');
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$cols=mysqli_num_fields($result);
	while($row=mysqli_fetch_row($result))
		{		
            for($i=0; $i<1; $i++)
			{
				$p=$row[$i];
				$u=$row[1];
            }
        }
				

		if($p!=$password)
		{
			echo "Your password is wrong!<br>";
		}
		else {
			echo "succeed<br>";
			$is_logged=1;
		}

	$query="select permission from user where user_name="."'".$username."'"." and password="."'".$p."'";
	$result1 = $con->query($query);
	$row1=mysqli_fetch_row($result1);
	$permission=$row1[0][0];
	if($permission==0)
	  		echo "<a href='mainpage.php'>Start shopping!</a>";
	  	else 
	  		echo "<a href='admin.php'>check order info</a>";

	setcookie("user",$u,time()+3600);
	setcookie("is_logged",$is_logged, time()+3600);

?>
</html>
