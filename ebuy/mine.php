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
			$o=$_COOKIE["user"];
		    echo "<a href='order.php?ID=$o'>MyOrder </a>";
		    echo "<br>";
            echo "<a href='setting.php?ID=$o'>Setting </a>";
		    ?>
		
	</body>
</html>
