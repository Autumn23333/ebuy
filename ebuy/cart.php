<html>
	<head>

		<title>
			
		</title>
	</head>

	<body>
	<?php

	$con=mysqli_connect('127.0.0.1','root','mysql','ebuy');
	if(!$con)
		die('Cannot connect database:'.mysqli_error());
	else
		echo 'Connected';
	echo '<br>';

#get information about items added to the cart
	$item_category = empty($_GET["item_category"])?null:$_GET["item_category"];
	$item_quantity = empty($_GET["item_quantity"])?null:$_GET["item_quantity"];
	$number = empty($_POST["number"])?null:$_POST["number"];
	echo $number;
	$user_id = $_COOKIE["user"];
	$subtotal=0;

	$query="select type_id from cart where user_id=".$user_id;
	echo "<br>";
	$result=mysqli_query($con,$query)
		or die('Error:'.mysqli_error($con));
	$row=mysqli_fetch_row($result);	
	$rows=mysqli_affected_rows($con);
		
#add to cart
	if($item_category)
	{
		
			$query="insert into cart values($user_id,$item_category,$item_quantity)";
			$result=mysqli_query($con,$query)
				or die('Error:'.mysqli_error($con));
			$item_category=null;
			$item_quantity=null;
		
	}
	
#query cart items
	$query='select item_name,description,unit_price,sum(quantity),a.type_id from category a, cart b where a.type_id=b.type_id and user_id='.$user_id.' group by type_id';
	$result=mysqli_query($con,$query)
		or die('Error:'.mysqli_error($con));
	$rows=mysqli_affected_rows($con);
	$cols=mysqli_num_fields($result);

		echo '<h3>View cart</h3>';
		echo "<table border=1>";
		echo '<tr>';
		
		echo '<td>';
		echo 'item_name';
		echo '</td>';
		echo '<td>';
		echo 'description';
		echo '</td>';
		echo '<td>';
		echo 'unit_pcice';
		echo '</td>';
		echo '<td>';
		echo 'quantity';
		echo '</td>';
		echo '<td>';
		echo 'option';
		echo '</td>';

		echo '</tr>';
	// echo '<div ng-app="">';
	// echo "<input type='text' ng-model='qwe'/>";
	// echo "<p>{{qwe}}</p>";
	    echo "<form action='cartCheck.php' method='POST'>";
		echo '<tr>';
		while($row=mysqli_fetch_row($result))
		{
			
            for($i=0; $i<$cols-1; $i++)
			{

                echo "<td>$row[$i]</td>";
                
            }
            	$delete_item="cartCheck.php?user_id=".$user_id."&"."type_id=".$row[4];
            
            
				echo "<td><a href='$delete_item'>delete</a></td>";
				echo "<td>";
			
                #setup a variable subtotal to calculate total price
                $subtotal=$subtotal+$row[2]*$row[3];
                echo "<input type='number' name='subtotal' id='subtotal' 
                	value='$subtotal' />";
                echo "<input type='number' name='type' id='type' 
                	value='$row[4]' />";

            echo "</div>";
            echo "<tr>";

                echo "</td>";
        	
		}
		echo '</tr>';	
	// echo '</div>';
		echo "<input type='submit' value='check out'>";
		echo "</form>";
		echo '</table>';
		echo "<a href='mainpage.php'>continue shopping!</a>"
	
	?>
	</body>
</html>
<style type="text/css">
	#subtotal
	{
		display: none;
	}
	#type
	{
		display: none;
	}
</style>
<script src="https://cdn.staticfile.org/angular.js/1.4.6/angular.min.js"></script>
