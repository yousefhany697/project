<?php
include 'config.php';
ini_set('display_errors' , 1);
ini_set('display_startup_errors' , 1);
error_reporting(E_ALL);

$result = $connect->query("SELECT * FROM products");

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "id :" . $row['id'] . "<br>";
        echo "product_name :" . $row['product_name'] . "<br>";
        echo "quantity :" . $row['quantity'] . "<br>";
        echo "price :" . $row['price'] . "<br>";
   } 
} else {
    echo "No Products Found.";
}
$connect->close();

