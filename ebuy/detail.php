
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
		$key = $_GET['ID'];
		$pic='SELECT pic_url FROM category WHERE type_id = "'. "". $key."".'"';
		$mypic = $conn->query($pic);
		if($mypic){
			while ($picture=$mypic->fetch_assoc()) {
				foreach($picture as $pickey=>$picvalue){
					echo "<div><img src=$picvalue width=300px height=300px></div>";
				}
			}
		}
		//show other detail information 
		$sql = 'SELECT item_name,description,producer_id,unit_price,stars,storage FROM category WHERE type_id = "'. "". $key."".'"';
		echo $key;
        $result = $conn->query($sql);
        if($result)
        {
            echo "<table border=1px>";
            
            while($row = $result->fetch_assoc()){
            	echo"<tr><td>name</td><td>description</td><td>producer_id</td><td>unit_price</td><td>stars</td><td>storage</td>";
            	echo "<td>number</td>";

            	echo "</tr>";
            	foreach($row as $key1=>$value)
				{
					echo "<td>$value</td>";

				}
				echo "<td><input type='number' name='number' id='qwe'></td>";

            }
            echo "</table>";
        }
        else
        {
            echo "Someting Wrong!";
            echo "<a href='mainpage.php'>Try again </a>";
        }
        //add to cart,need to process $KEY to another php
        $addCart="cart.php?user_id=".$_COOKIE['user']."&item_category=".$key."&item_quantity=1";
        echo "<a href=$addCart>add to cart<br></a>";
        //pay, need to move to another php
        echo "<a href='payment.php'>buy with one click</a>";

  //       $subquery="select order_id from user_order where user_id=".$_COOKIE['user']. " order by order_id DESC limit 1";
       
  //       $query="insert into order_category values((".$subquery.")".", ".$key.",".$_COOKIE['user'].")";
  //        echo $query;
  //       $result=mysqli_query($conn,$query)
		// 		or die('Error:'.mysqli_error($conn));

		// $query="insert into stock_out values(null,".$key.","."1".","."now()"."(".$subquery.")";
		// $result=mysqli_query($conn,$query)
		// 		or die('Error:'.mysqli_error($conn));

		mysqli_close($conn);
	?>
</body>
</html>
<script type="text/javascript">
	function sub()
	{
		var num=document.getElementById("qwe").value;
		return num;

	}
</script>

