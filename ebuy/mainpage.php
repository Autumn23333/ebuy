<?php
if (isset($_COOKIE["user"]))
  echo "Welcome " . $_COOKIE["user"] . "!<br />";
else
  echo "Welcome guest!<br />";
?>
<html>
	<head>
		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>
		<?php
			header("content-type:text/html;charset=utf-8");
			//connect to database,password need change!!!
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$dbname = "ebuy";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			//limit rows in each page
			$length=15;
			$pagenum=@$_GET['page']?$_GET['page']:1;
			
			//count rows of data
			$sqltot="select count(*) from category";
			$result = $conn->query($sqltot);
			$arrotot= mysqli_fetch_row($result);
			$pagetot=ceil($arrotot[0]/$length);
		 
			//limit pages
			if($pagenum>=$pagetot){
				$pagenum=$pagetot;
			}
			$offset=($pagenum-1)*$length;
			
			//get data from db
			$sql="select * from category order by type_id limit {$offset},{$length}";
		 
			$nextresult=$conn->query($sql);
			echo "<h1>category</h1>";
			echo "<table width='700px' border='1px'>";
			while($row=mysqli_fetch_assoc($nextresult)){
				$send=$row['type_id'];
				echo "<tr>";
			 	echo "<td>{$row['item_name']}</td>";
			 	echo "<td>{$row['description']}</td>";
			 	echo "<td>{$row['unit_price']}</td>";
			 	echo "<td><a href='detail.php?ID=$send'>Details </a></td>";
			 	echo "</tr>";
			}
			echo "</table>";
			
			//calculate prepage and nextpage
			$prevpage=$pagenum-1;
			$nextpage=$pagenum+1;
		 
			echo "<h2><a href='mainpage.php?page={$prevpage}'>prepage</a> <a href='mainpage.php?page={$nextpage}'>nextpage</a></h2>";

		 	echo "<h4><a href='mainpage.php'>mainpage</a> <a href='cart.php'>cart</a> <a href='mine.php'>myinfo</a>";
		 	echo "<br>";
		 	if(empty($_COOKIE["is_logged"])){
		 		echo "<a href='login.html'>log in</a><br>";
		 	}
		 	else{
		 		echo "<a href='logout.php'>log out</a><br>";
		 	}

		 	echo "<a href='reg.html'>register</a>";
			//release conn
			mysqli_close($conn);
		?>
	</body>
</html>