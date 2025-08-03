<?php

$server = 'localhost';
$username ='root';
$password='';
$db = 'accounts';
$connect = new mysqli($server , $username , $password , $db);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
