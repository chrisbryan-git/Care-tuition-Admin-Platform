<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'Cares database';

    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows === 1) {
        $_SESSION['username'] = $username; // store username

        header('Location: home');
        exit();
    } else {
        $_SESSION['error'] = 'Error! Invalid password or username.Try agin!'; 
        header('Location: index');
        exit;
    }
    $conn->close();
} else { 
    header('Location: index');
    exit();
}
?>
