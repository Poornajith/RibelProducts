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

//Add new sales data