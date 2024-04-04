<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM fees WHERE status = 'pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Student: " . $row["student_name"] . " - Amount: " . $row["amount"] . "<br>";
    }
} else {
    echo "No pending fees.";
}

$conn->close();
?>
