<html>
	<head>
	</head>
	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$dbname = "ebuy";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			echo "<p><font color=\"red\">Connected successfully</font></p>";
			// user
            /*
			for ($x=5001; $x<=10000; $x++){
            $sql = "INSERT INTO user (first_name, last_name, password, user_name, phone, email, address) values('first_vic', 'last_lem', 'pass', 'user_name_', '121323', 'example@pitt.edu', 'center ave')";
            $result = $conn->query($sql);
            }
            */
            // cart
            /*
            for ($x=1; $x<=10000; $x++){
            	$sql = "INSERT INTO cart(user_id) values($x)";
            	$result = $conn->query($sql);
            }
            */
            /*
            // category
            for ($x=5001; $x<=10000; $x++){
            	$sql = "INSERT INTO category(item_name, description, producer_id, unit_price, pic_url, storage) values(". "'" . "apple".(string)$x."'"  .", 'nothing', '1', 12.2, 'http://img.zcool.cn/community/0185bf57b4328f0000012e7ef76ee5.jpg', 100)";
            	//echo $sql;
            	$result = $conn->query($sql);

            }
            */
            /*
            // producer
            for ($x=5001; $x<=10000; $x++){
            	$sql = "INSERT INTO producer(producer, address, phone, email) values('GentaEagal', 'pitt', 123456789, 'ge@ge.com')";
            	$result = $conn->query($sql);
            }
            */
            /*
            // order_category
            for ($x=5001; $x<=10000; $x++){
            	$sql = "INSERT INTO order_catagory(order_id, type_id, quantity) values($x,".(string)($x%3+15005).",1)";
            	//echo $sql;
            	$result = $conn->query($sql);
            }
            */
            /*
            // return_item
            for ($x=1; $x<=5000; $x++){
            	$sql = "INSERT INTO return_item(user_id, type_id, quantity, return_date, order_id, delivery_date, is_broken) values($x, $x + 15005, 1, now(), $x, now(), 1)";
            	$result = $conn->query($sql);

            }
            */
            /*
            // stock in
            for ($x=5001; $x<=10000; $x++){
            	$sql = "INSERT INTO stock_in(record_id, type_id, quantity, in_date) values($x, $x + 15005, 10, now())";
            	$result = $conn->query($sql);

            }
            */
            // stock out
            for ($x=5001; $x<=10000; $x++){
            	$sql = "INSERT INTO stock_out(type_id, quantity, out_date, order_id) values($x%3+15005, 1, now(), $x)";
            	//echo $sql;
            	$result = $conn->query($sql);

            }
            // user_order ok
            /*
            for ($x=5001; $x<=10000; $x++){
            	$sql = "INSERT INTO user_order(order_date, description, user_id) values(now(), 'no', $x)";
            	#echo $sql;
            	$result = $conn->query($sql);
            }
            */
            /*
            // category
            for ($x=0; $x<=3000; $x++){
            	$sql = "INSERT INTO cart(quantity) values(NULL)";
            	$result = $conn->query($sql);
            }
            */
            if($result)
            {
            	echo ok;
            }
			mysqli_close($conn);
		?>
	</body>
</html>
