<?php
include '../ConnectDB.php';
$sql = "SELECT * FROM stock";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ItemID"]. " Qty In Stock" . $row["InStock"]. "<br>";
    }
} else {
    echo "0 results";
}