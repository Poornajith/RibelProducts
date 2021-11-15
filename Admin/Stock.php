<?php
include '../ConnectDB.php';
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Stock</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
<?php

$sql = "SELECT * FROM all_products";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $item=$row["ItemID"];
        $itemInStock=$row["InStock"];
        echo '<div class"row"> 
                <div class="alert alert-light" role="alert">
                  Item ID : ' . $row["ItemID"]. '&nbsp;&nbsp;'. $row["ItemName"].' &nbsp;&nbsp;
                  Qty In Stock :' . $row["InStock"].'
             </div>
                <form action="Stock.php" method="post">
                <input type="number" name="qty">
                <input type="submit" name="Add" value="Add" class="btn btn-success">
                <input type="hidden" value="'.$item.'" name="item">
                <input type="hidden" value="'.$itemInStock.'" name="itemInStock">
                <input type="submit" name="Remove" value="Remove" class="btn btn-warning">
                </form> 
                </div>
                 ';
    }
} else {
    echo "0 results";
}
if (isset($_POST['Add'])){

    $itemID =$_POST['item'];
    $stock =$_POST['itemInStock'];
    $qty =$_POST['qty']+$stock;
    $sql ="UPDATE all_products SET InStock =$qty WHERE ItemID='$itemID'";
    $result=$db->query($sql);


}else if (isset($_POST['Remove'])){

    $itemID =$_POST['item'];
    $stock =$_POST['itemInStock'];
    $qty =$stock-$_POST['qty'];
    $sql ="UPDATE all_products SET InStock =$qty WHERE ItemID='$itemID'";
    $result=$db->query($sql);

}
?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
