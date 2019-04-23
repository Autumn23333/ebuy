<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		//connect to database, need to change password
		$servername = "localhost";
		$username = "root";
		$password = "mysql";
		$dbname = "ebuy";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		else
			echo"success";
		//show picture by url get from db
		echo"<h1>Your order:</h1>";
		//this key need to be changed to the value(user_id) from other pages!!!!!!
		$user_id = $_COOKIE["user"];
		//show other detail information 
		$sql = 'SELECT item_name,category.description,unit_price,order_category.quantity,user_order.order_date,shippment FROM user_order JOIN order_category ON user_order.order_id=order_category.order_id JOIN category ON order_category.type_id= category.type_id WHERE user_id = "'. "". $user_id."".'"';
        $result = $conn->query($sql);
        if($result)
        {
            echo "<table border=1px>";
            while($row = $result->fetch_assoc()){
            	echo"<tr><td>item_name</td><td>description</td><td>unit_price</td><td>quantity</td><td>order_date</td><td>shippment</td></tr>";
            	foreach($row as $key=>$value)
				{
					echo "<td>$value</td>";
				}
				$u=$_COOKIE["user"];
				echo "<td><a href='return.php?ID=$u'>return order </a></td>";
            }
            echo "</table>";
        }
        else
        {
            echo "Someting Wrong!";
            echo "<a href='mainpage.php'>Try again </a>";
        }
			
		mysqli_close($conn);
	?>
</body>
</html>