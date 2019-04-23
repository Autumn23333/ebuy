<html>
	<head>
		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>

		<?php
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$dbname = "ebuy";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			$u=$_COOKIE["user"];

            $sql_searchOrder = "SELECT item_name, quantity FROM order_category c, user_order o,category ca
            	WHERE c.order_id = o.order_id and ca.type_id=c.type_id
            	and user_id=$u";
            $result = $conn->query($sql_searchOrder);
			if ($result)
			{
				echo "<table border=1px>";
				echo "<tr>";
				echo '<td><"item">';
				echo '<td><"quantity"></td>';
				echo '<td><"return"></td>';
				echo '<td><"isbroken"></td>';
				echo "</tr>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";

					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo '<td><input type="checkbox" name="return"></td>'; 
					echo '<td><input type="checkbox" name="isbroken"></td>'; 
					//echo "<td><a href='returnOrder.php?ID=$send'>returnOrder </a></td>";
					echo "</tr>";
				}
				echo "</table>";
				
				echo "<a href='return_success.php?ID=$u'>Submit </a>";
			}
			
		?>
	</body>
</html>
