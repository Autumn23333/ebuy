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
            $sql_searchOrder = "SELECT order_id, order_date FROM `user_order` WHERE user_id = 1";
            $result = $conn->query($sql_searchOrder);
			if ($result)
			{
				echo "<table border=1px>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					$send = 1;
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "<td><a href='return.php?ID=$send'>returnOrder </a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			$result->free();
		?>
	</body>
</html>
