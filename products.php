<?php
include 'config.php';
$view = "SELECT *FROM products";
$result = $connect->query($view);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Products</title>
    <link rel="stylesheet" href="project.css">
</head>
<body id="products_body">
<a href="logout.php" id="logout_1" onclick="return confirm('Are You Sure You Want To Logout ?')">
    <button id="logout_button_1">Log out ಠ╭╮ಠ</button>
</a>

    <a href="add_new_product.html" id="add_products_link_1">
        <button id="add_product_button_1">add product (✿◠‿◠) ?</button>
    </a>




    

<div id="container_4">

    <table>
        <thead>
            <tr>
                 <th id="name_column">Product Name</th>
                 <th id="quantity_column">Quantity</th>
                 <th id="price_column">Price(Euro)</th>
                 <th id="actions_column">actions</th>               
            </tr>
        </thead>
        <tbody>
            <?php if($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                 <tr>
                    <td> <?= htmlspecialchars($row['product_name']) ?> </td>
                    <td> <?= $row['quantity']?> </td>
                    <td> <?= $row['price'] ?> </td>
                    <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                 </tr> 
                 <?php endwhile; ?>
                 <?php else: ?>
                    <tr>
                        <td colspan="4">No Products Found> </td>
                    </tr>
                    <?php endif; ?>
         </tbody>
    </table>

</div>


</body>
<?php
    echo "Created by Yousef_hany";
    ?>
