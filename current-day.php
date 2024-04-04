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


<!DOCTYPE html>
<html>
<head>
    <title>Timetable</title>
</head>
<body>
    <h1>Today's Timetable</h1>

    <?php
    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "Cares database");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the current day
    $currentDay = date("l");

    // SQL query to retrieve records for the current day
    $sql = "SELECT * FROM timetable WHERE day = '$currentDay'";
    $result = mysqli_query($conn, $sql);

    // Check if any records were found
    if (mysqli_num_rows($result) > 0) {
        // Display the records in a table
        echo "<table>";
        echo "<tr><th>Teacher</th><th>Student</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['teacher_name'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found for today.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>