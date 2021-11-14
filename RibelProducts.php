<!doctype html>
<html lang="en">
<?php
include 'ConnectDB.php';

//// Database configuration
//$dbHost     = "localhost";
//$dbUsername = "root";
//$dbPassword = "";
//$dbName     = "products";
//
//// Create database connection
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ribel Products</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php include "./NavBar.php"; ?>
<div class="row">
<?php
for ($i=1;$i<10;$i++) {
            echo '<div class="card">
                    <img class="card-img-top" src="HomePageImgut.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                 </div> ';
}
?>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add New Item Image
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="upload-img">
                    <form action="Upload.php" method="post" enctype="multipart/form-data">
                        <br> Item Name :
                        <input list="Item Name" name="ItemName">
                        <datalist id="Item Name">
                            <?php
                            $sql = "SELECT ItemName FROM itemnames";
                            $result = $db->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row['ItemName']. '">'.$row['ItemName']. '</option>';
                            }
                            ?>
                        </datalist>
                        <br>
                        Select Image File to Upload:
                        <input type="file" class="btn btn-secondary" name="file">

                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                </form>
        </div>
    </div>
</div>

<script src="index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
