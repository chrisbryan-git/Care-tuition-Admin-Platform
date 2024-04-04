<?php

$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM reports";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Report ID: " . $row["id"] . "<br>Report Data: " . $row["report_data"] . "</p>";
    }
} else {
    echo "No reports found.";
}

$conn->close();
?>
