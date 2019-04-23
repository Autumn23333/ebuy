<!DOCTYPE html>
<html>
<head>
	<title>w</title>
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
			echo"welcome, administrator!<br>";
		$arr=array();
		$sql='SELECT count(*), month(order_date) from user_order where  year(order_date)=2017 group by month(order_date) ORDER BY month(order_date);';
		$result = $conn->query($sql);
        if($result)
        {
            while($row = $result->fetch_row()){
				$arr[]=$row[0];
            }
        }
        else
        {
            echo "Someting Wrong!";
            echo "<a href='mainpage.php'>Try again </a>";
        }
        $jan=$arr[0];
        $feb=$arr[1];
        $mar=$arr[2];
        $apr=$arr[3];
        $may=$arr[4];
        $june=$arr[5];
        $july=$arr[6];
        $aug=$arr[7];
        $sep=$arr[8];
        $oct=$arr[9];
        $nov=$arr[10];
        $dec=$arr[11];
        echo "<a href='views.php?jan=$jan&feb=$feb&mar=$mar&apr=$apr&may=$may&june=$june&july=$july&aug=$aug&sep=$sep&oct=$oct&nov=$nov&dec=$dec'>views</a>";
        $sql1='select item_name, category.type_id, count(*) from category join order_category on category.type_id=order_category.type_id join user_order on order_category.order_id=user_order.order_id where year(order_date)=2018 group by category.type_id order by count(*) desc limit 1;';
        $result1 = $conn->query($sql1);
        if($result1){
            while($row1 = $result1->fetch_row()){
                echo "<br>";
                echo "The most popular product in 2018 is <span style='color:green'>$row1[0]</span>";
            }
         }       
        $sql2='select producer_id, category.type_id, count(*) from category join order_category on category.type_id=order_category.type_id join user_order on order_category.order_id=user_order.order_id where year(order_date)=2018 group by category.type_id order by count(*) desc limit 1;';
        $result2 = $conn->query($sql2);
        if($result2){
            while($row2 = $result2->fetch_row()){
                echo "<br>";
                echo "The most popular producer in 2018 is producer_";
                echo $row2[0];
            }
        }
        $sql3='select item_name, category.type_id, count(*) from category join order_category on category.type_id=order_category.type_id join user_order on order_category.order_id=user_order.order_id where year(order_date)=2018 group by category.type_id order by count(*) limit 1;';
        $result3 = $conn->query($sql3);
        if($result3){
            while($row3 = $result3->fetch_row()){
                echo "<br>";
                echo "The worst product in 2018 is ";
                echo $row3[0];
            }
        }

	?>
</body>
</html>