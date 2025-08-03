<?php
include 'config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST['full_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $username  = trim($_POST['username'] ?? '');
    $password  = trim($_POST['password'] ?? '');

    if ($full_name === '' || $email === '' || $username === '' || $password === '') {
        echo "Please fill in all fields!";
        exit;
    }

   
    $check = $connect->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "Username already taken.";
        exit;
    }

   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $connect->prepare("INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $username, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['id'] = $connect->insert_id;
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        header("Location: your_account_created.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $check->close();
    $connect->close();
} else {
    echo "Access denied!";
}

?>



    
