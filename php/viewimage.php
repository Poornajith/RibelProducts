<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Images</title>
</head>
<body>
    

<?php
// Include the database configuration file
include 'db.php';

// Get images from the database
$sql = $conn->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($sql->num_rows > 0){
    while($row = $sql->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <div id = "img">
    <img src="<?php echo $imageURL; ?>" alt="" />
    </div>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php
 }
 
 ?>
 </body>
</html>