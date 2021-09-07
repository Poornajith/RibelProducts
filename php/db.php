<?php
$server = "localhost";
$username = "root";
$password = "";

$conn = new mysqli ( $server, $username, $password, "products");

try{
    $conn = new PDO("mysql:host=$server;dbname=products",$username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "RIbel Products <br>";    
}catch(PODException $e){
    echo "Database Connection failed:<br>" . $e->getMessage();

}
/*$sql = "INSERT INTO all_products VALUES ('SS50', 'Sesami Seed', 50.00, 16.5, 10) ";
$conn->exec($sql);
echo "New record created successfully";
*/

//$conn =null;

?>