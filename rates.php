<?php
$host = 'localhost';
$username = 'root';
$password = 'omulodi54';
$database = 'school';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $rate = $_POST["rate"];

    // Insert the new rate
    $insert_sql = "INSERT INTO rates (rate_value) VALUES ($rate)";
    if ($conn->query($insert_sql) === TRUE) {
        // Get the newly inserted rate_id
        $new_rate_id = $conn->insert_id;
        
        $new_rate_value = $rate;
        $update_sql = "UPDATE rates SET rate_value = $new_rate_value WHERE id = 1";
        if ($conn->query($update_sql) === TRUE) {
            
            $select_updated_rates_sql = "SELECT * FROM rates";
            $result = $conn->query($select_updated_rates_sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Rate: " . $row["rate_value"] . "<br>";
                }
            } else {
                echo "No rates found";
            }

            header("Location: Sessions.php");
            exit;
        } else {
            echo "Error updating rate: " . $conn->error;
        }
    } else {
        echo "Error inserting rate: " . $conn->error;
    }
}

$conn->close();
?>
