<!doctype html>
<html>
<head>
<?php
	include "db.php";	
		if (isset($_POST['submit'])){
			
			 $itemCode =$_POST["ItemCode"]; // item code
			 $itemName =$_POST["ItemName"]; //item name
			 $weight = $_POST["Weight"]; // "g" or "kg"
			 $price = $_POST["ItemPrice"]; //item lable price
			 $discount =$_POST["Dicsount"]; //discount for dealer
			 $qty =$_POST["qty"]; // qty when enter database new item
			
			$sql = "INSERT INTO all_products VALUES ('$itemCode', '$itemName', '$weight', $price, $discount, $qty) ";
			/*$conn->exec($sql);
			echo "New Item Added successfully";
		
			$conn =null;
			*/
			
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$conn->close();
	}
	
?>
	<meta charset="utf-8">
<title>Add Item</title>
</head>
<body>
	<br>	
	<form action="AddNewItem.php" method = "post">
		Item Code : <input type="text" name = "ItemCode"><br>
		Item Name : <input type="text" name = "ItemName"><br>
		Item Weight : <input type="text" name = "Weight"> kg / g <br>
		Item Price : <input type="number" name = "ItemPrice" step = ".01"> /= <br>
		Seller Discount : <input type="number" name = "Dicsount" step = ".01"> %<br>
		Quantity : <input type="number" name = "qty"><br>
		<input type="submit" value ="Add Item" name="submit">
	</form>	
</body>
</html>