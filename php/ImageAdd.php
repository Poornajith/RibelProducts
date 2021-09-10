<?php
error_reporting(0);
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$item = $_POST['ItemId'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "uploads/".$filename;
		
	include 'db.php';
		// Get all the submitted data from the form
		$sql = "INSERT INTO images (ItemID, file_name, uploaded_on) VALUES ('$item', '$filename', NOW())";

		// Execute query
		mysqli_query($conn, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
echo $msg;
$result = mysqli_query($conn, "SELECT * FROM images");
?>
