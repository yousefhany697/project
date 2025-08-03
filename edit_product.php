<?php 
include 'config.php';

if(!isset($_GET['id'])){
    die("Product id Is Missing.");
}

$id = (int)$_GET['id'];

$stmt = $connect->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i" , $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();


if(!$product){
    die("Product Not Found");
}
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $product_name = $_POST['product_name'];
    $quantity = (int)$_POST['quantity'];
    $price = (int)$_POST['price'];



    $updated_stmt = $connect->prepare("UPDATE products SET product_name = ? , quantity = ? , price = ?  WHERE id = ?");
    $updated_stmt->bind_param("siii",  $product_name, $quantity , $price , $id );

    if($updated_stmt->execute()){
        echo "Product Updated Succefully.";
    } else{
        echo "Failed To Update Product.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet " href="project.css">
</head>
<body id="edit_product_body">
    <div id="container_5">
        <div id="back_products_div">
        
             <a href="products.php">
                 <button id="back_button_3" >←_← Back To Products Page ?</button> 
             </a>
        
        </div>
             <h2 id="edit_product_h2">Update Your Product</h2>
             <form method="POST">
                 <label    for="Product_name_field"     id="product_name_label">Product Name</label>
                 <input type="text"                     id="Product_name_field"   name="product_name" placeholder="Enter Your Product Name" required>
                 <label    for="quantity_field"         id="quantity_label">            Quantity</label>
                 <input type="text"                     id="quantity_field"       name="quantity"     placeholder="Enter Your Quantity" required>
                 <label     for="price_field"           id="price_label">                Price(Euro)</label>
                 <input type="text"                     id="price_field"          name="price"        placeholder="Enter Your Price" required>
                <div id="submit_div_3">  
                 <input type="submit"                   id="submit_button_3" value="Update"> 
                 </div> 

             </form>
    </div>
</body>
</html>
<?php
    echo "Created by Yousef_hany";
    ?>
