<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

$connect = new mysqli("localhost" , "root" , "" , "accounts");

if($connect->connect_error){
    die("Failed To Connect With Data Base".$connect->connect_error);
}

if(!empty($username) && !empty($password)){
    $stmt = $connect->prepare("SELECT * FROM users WHERE username = ?  ");
    $stmt->bind_param("s" , $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if(password_verify($password , $hashed_password)){    
            header("location: you_logged_in.html");
            exit();
        } else {
        echo "Wrong Username Or Password!";
    } 
}else{
    echo "Wrong Username Or Password!";
    }

$stmt->close();
} else {
    echo "Please Filled In All Fields";
}
$connect->close();
} 
else {
    echo "Access Denied!";
}
?>



























