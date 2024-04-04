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

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Delete the student record
    $sql = "DELETE FROM students_table WHERE id = $student_id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
    alert("Deleted successfully!");
    setTimeout(function(){
        window.location.href = "students";
    }, 0);
</script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
