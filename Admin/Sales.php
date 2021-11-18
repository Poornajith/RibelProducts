<?php
include '../ConnectDB.php';

//SELECT * FROM sales LEFT JOIN all_products ON sales.ItemID=all_products.ItemID
//SELECT * FROM sales LEFT JOIN all_products ON sales.ItemID=all_products.ItemID
// where time between '2012-03-11 00:00:00' and '2021-11-17 00:00:00'


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
    <link rel="stylesheet" href="./AdminStyles.css">

</head>
<body>
<?php include "./AdminNav.php" ?>
<table class="table table-hover table-dark">
    <thead>
    <tr> <h1>Sales Summery</h1></tr>
    </thead>
<tbody>
<tr>
 <form action="Sales.php" method="post">
     <th>Start Date</th>
    <td>
    <input type="datetime-local" name="sDate" label="Start Date">
    </td>
    <th>End Date</th><td>
    <input type="datetime-local" name="eDate" label="End Date"></td>
    </tr>
    </tbody>
    </table>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <input type="submit" name="submit" class="btn btn-primary btn-block">
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
 </form>


 <?php
    if (isset($_POST['submit'])){
        $sDate =date("Y-m-d H:i:s", strtotime($_POST["sDate"]));
        $eDate =date("Y-m-d H:i:s", strtotime($_POST["eDate"]));

        $total =0;
        $sql = "SELECT * FROM sales LEFT JOIN all_products ON sales.ItemID=all_products.ItemID where time between '$sDate' and '$eDate'";
        $result = $db->query($sql);
?>
 <table class="table table-hover table-dark">
     <thead>
     <tr>
         <th scope="col">Item ID</th>
         <th scope="col">Item Name</th>
         <th scope="col">Unit Price</th>
         <th scope="col">Seller Discount</th>
         <th scope="col">Sold Qty</th>
         <th scope="col">#</th>
     </tr>
     </thead>
     <tbody>
 <?php
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $itemID = $row["ItemID"];
            $itemName = $row["ItemName"];
            $rowTotal = ($row["Price"]-($row["Price"]*$row["Discount"]/100))*$row["soldQty"];
            $total += $rowTotal;
//        echo "Row Total = " .$rowTotal. "<br>";
            echo '<tr>
                    <th>'.$row["ItemID"].'</th>
                    <td>'.$row["ItemName"].'</td>
                    <td>'.$row["Price"].'</td>
                    <td>'.$row["Discount"].'</td>
                    <td>'.$row["soldQty"].'</td>
                    <td>'.$rowTotal.'</td>
                </tr>';

        }
        echo '<tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>'.$total.'</td>
            </tr>';

//        echo "Total :".$total;


    }else{
        echo '<h5 class="alert alert-warning"> Please select Time Duration !</h5>';
    }

 ?>
     </tbody>
 </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>