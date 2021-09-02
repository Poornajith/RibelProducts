<?php
$server = "localhost";
$username = "root";
$password = "";

//$link = new mysqli ( $server, $username, $password, "products");

try{
    $conn = new PDO("mysql:host=$server;dbname=products",$username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";    
}catch(PODException $e){
    echo "Connection failed:" . $e->getMessage();

}

$sql = "INSERT INTO all_products VALUES ('AK50', 'Aba Kudu', 80.00, 12.5, 20) ";
$conn->exec($sql);
//echo "New record created successfully";


$conn =null;

?>