<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index");// redireting if username is empty or not set
    exit;
}

$_SESSION['last_activity'] = time();

?>
<script>
setTimeout(function(){
    window.location.href = "index";
}, 660000);
</script>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cares database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the URL parameter

    // Perform the deletion query
    $deleteSql = "DELETE FROM exam_scores WHERE id = $id";

    if ($conn->query($deleteSql) === TRUE) {
        echo '<script>alert("Record deleted successfully!"); window.location="exams"</script>';
        // header("Location: exam_table"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Please provide a valid ID.";
}

// Close the database connection
$conn->close();
?>
