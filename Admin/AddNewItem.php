<!doctype html>
<html>
<head>
    <?php
    include '../ConnectDB.php';
    if (isset($_POST['submit'])){

        $itemCode =$_POST["ItemCode"]; // item code
        $itemName =$_POST["ItemName"]; //item name
        $weight = $_POST["Weight"]; // "g" or "kg"
        $price = $_POST["ItemPrice"]; //item lable price
        $discount =$_POST["Dicsount"]; //discount for dealer
        $qty =$_POST["qty"]; // qty when enter database new item

        $sql = "INSERT INTO all_products (`ItemID`, `ItemName`, `weight`, `Price`, `Discount`, `InStock`) VALUES ('$itemCode','$itemName','$weight',$price,$discount,$qty)";

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        $sql = "INSERT INTO itemnames (`ItemID`, `ItemName`) VALUES ('$itemName','$itemCode')";
        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }

    ?>
    <meta charset="utf-8">
    <title>Add Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./AdminStyles.css">

</head>
<body>
<?php include "./AdminNav.php" ?>
<br>
<table class="table table-hover table-dark">
    <thead></thead>
    <tbody>
    <tr>
<form action="AddNewItem.php" method = "post">
    <th>Item Code :</th><td><input type="text" name = "ItemCode"></td></tr><th>

    Item Name :</th><td> <input type="text" name = "ItemName"></td></tr><th>
    Item Weight :</th><td>  <input type="text" name = "Weight"> kg / g </td></tr><th>
    Item Price :</th><td>  <input type="number" name = "ItemPrice" step = ".01"> /= </td></tr><th>
    Seller Discount :</th><td>  <input type="number" name = "Dicsount" step = ".01"> %</td></tr><th>
    Quantity :</th><td>  <input type="number" name = "qty"></td></tr><tr><td><td>
    <input type="submit" value ="Add Item" name="submit" class="btn btn-primary"></tr></td>
</form>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
