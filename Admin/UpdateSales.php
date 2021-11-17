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
    <title>Update Sales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php include "./AdminNav.php" ?>
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
            $itemId =$row["ItemID"];
            echo '
            <tr>
            <th scope="row">' . $row["ItemID"] . '</th>
             <td>' . $row["ItemName"] . '</td>
            <td>
            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$itemId.'">
                          Add Qty
                        </button>
                        <!-- Modal -->
            </td>
            </tr>
            <div class="modal fade" id="'.$itemId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">'. $row["ItemName"].'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                             <div class"row"> 
                                <div class="alert alert-light" role="alert">
                                  Item ID : ' . $row["ItemID"]. ' &nbsp;&nbsp;
                                </div>
                                    <form action="UpdateSales.php" method="post">
                                        <input type="number" name="qty" value="0">
                                        <input type="submit" name="Add" value="Add" class="btn btn-success">
                                        <input type="hidden" value="'.$itemId.'" name="item">
                                    </form> 
                             </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div> 
            
            
            ';
        }
    }else{
        echo "0 results";
    }
    if (isset($_POST['Add'])){
        // set default timezone
        date_default_timezone_set('Asia/Colombo'); // CDT
        $current_date = date('y-m-d h:i:s');
        $itemID =$_POST['item'];
        $qty =$_POST['qty'];
        $sql ="INSERT INTO sales (`ItemID`, `soldQty`, `time`) VALUES ('$itemID', $qty, '$current_date')";
        $result=$db->query($sql);
        //INSERT INTO sales (`ItemID`, `soldQty`, `time`) VALUES ('AA50', 20, NOW())
        echo $current_date;


    }
    ?>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>