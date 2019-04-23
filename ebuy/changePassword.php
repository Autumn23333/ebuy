<html>
	<head>
		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>

		<?php
		    $password_new = $_GET['newPassword'];
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$dbname = "ebuy";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
            $sql = "update user set password = '$password_new' WHERE user_id = 1";
            $result = $conn->query($sql);
            echo "change Password success!";
            echo "<td><a href='mine.php?ID=$send'>OK </a></td>";

		?>
	</body>
</html>
