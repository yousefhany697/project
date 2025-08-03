<?php
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $price = isset($_POST['price']) ? (int)$_POST['price'] : 0;

    if (empty($product_name) || empty($quantity) || empty($price)) {
        echo "please fill out all the product details.";
        exit;
    }
    $check_product = "SELECT id FROM products WHERE product_name = ?";
    $stmt = $connect->prepare($check_product);
    $stmt->bind_param("s" , $product_name);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows > 0){
        echo "this product name already exists /(ㄒoㄒ)/~~";
    } else{

    $stmt = $connect->prepare("INSERT INTO products (product_name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $product_name, $quantity, $price);

    if ($stmt->execute()) {
        echo "Product Added Successfully (●'◡'●)";
    } else {
        echo "ERROR: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
} 

}else{
    echo "Access denied!";
}





