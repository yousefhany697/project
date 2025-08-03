<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("Product ID is missing.");
}

$id = (int) $_GET['id'];


$stmt = $connect->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("i", $id);

if($stmt->execute()) {
    header("Location: products.php");
    exit;
} else {
    echo "Failed to delete the product.";
}
?>
