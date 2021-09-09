<?php
// Include the database configuration file
include 'db.php';

// Get images from the database
$conn = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($conn->num_rows > 0){
    while($row = $conn->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php
 }
 echo "test";
 ?>