<!doctype html>
<html>
<head>
<?php
include "db.php";
	
		$itemCode =$_POST["ItemCode"]; // item code
		$itemName =$_POST["ItemName"]; //item name
		$price = $_POST["ItemPrice"]; //item lable price
		$discount =$_POST["Dicsount"]; //discount for dealer
		$qty =$_POST["qty"]; // qty when enter database new item
		
	
	
?>
<meta charset="utf-8">
<title>AddItem</title>
</head>

<body>
<?php
$sql = "INSERT INTO all_products VALUES ('$itemCode', '$itemName', $price, $discount, $qty) ";
$conn->exec($sql);
echo "New Item Added successfully";
$conn =null;
?>	
	<br>
	<a href="AddNewItem.html">
	Add New Item
	</a>
	
	
</body>
</html>