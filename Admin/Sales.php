<?php
include '../ConnectDB.php';
$total =0;
$sql = "SELECT ItemID, SoldQty FROM sales";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ItemID"]. " - SoldQty: " . $row["SoldQty"]. "<br>";
        $Item = $row["ItemID"];
        $sql = "SELECT * FROM all_products WHERE ItemID ='$Item'";
        $result =$db->query($sql);
        echo "Item Name:" .$row["ItemName"]. "Seller Discount:". $row["Discount"]. "Price:".$row["Price"]. "Weight:" .$row["weight"]. "<br>";
        $rowTotal = ($row["Price"]-($row["Price"]*$row["Discount"]))*$row["SoldQty"];
        $total += $rowTotal;
        echo "Row Total = " .$rowTotal. "<br>";
        echo "Total :".$total;
    }
} else {
    echo "0 results";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<h2>Add Sales Data</h2>
<table class="table table-hover table-dark">
    <thead>
    <tr>
        <th scope="col">Item ID</th>
        <th scope="col">Item Name</th>
        <th scope="col">Sold Qty</th>
    </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT ItemID, ItemName FROM all_products";
$result=$db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
            <tr>
            <th scope="row">' . $row["ItemID"] . '</th>
             <td>' . $row["ItemName"] . '</td>
            <td>
            <input type="number" value="0" >
            </td>
            </tr>
            ';
    }
}else{
    echo "0 results";
}
?>
    </tbody>
</table>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>