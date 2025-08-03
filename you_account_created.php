<?php
 session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>congratulations 🥳 !!</title>
    <link rel="stylesheet" href="project.css">
</head>
<body id="your_account_created_body">
    <div id="container_7">
       <h2>Congratulations Your Account Has Been Created Succefully. </h2>
       <h2> <?php echo $_SESSION['full_name']; ?> Now Lets Login And Explore More Futures In Our Wesite
         <a href="login.html" id="login_link_1">login</a>
       </h2>
    </div>
</body>
</html>
