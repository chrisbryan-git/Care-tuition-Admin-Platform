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

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT teacher_name, student_name, student_location, day, time_in,time_out,phone FROM timetable WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updating student information
    $newTeacherName = $_POST['teacher_name'];
    $newStudentName = $_POST['student_name'];
    $newStudentLocation = $_POST['student_location'];
    $newDay = $_POST['day'];
    $newTime_in = $_POST['time_in'];
    $newTime_out = $_POST['time_out'];
    $newPhone = $_POST['phone'];

    $updateSql = "UPDATE timetable SET teacher_name = '$newTeacherName', student_name = '$newStudentName', student_location = '$newStudentLocation', day = '$newDay',time_in='$newTime_in',time_out='$newTime_out',phone='$newPhone' WHERE id = '$id'";

    if ($conn->query($updateSql) === TRUE) {
        echo "<script>alert('Changes saved successfully'); window.location.href = 'home';</script>";
        exit;
    } else {
        echo "Error updating information: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>edit timetable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for the form */
        body {
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Edit Timetable</h2>
        <form method="POST">
            <div class="form-group">
                <label for="student_name">Teacher's Name:</label>
                <input type="text" class="form-control" name="teacher_name" value="<?php echo $row['teacher_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="student Name">Student Name:</label>
                <input type="text" class="form-control" name="student_name" value="<?php echo $row['student_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="student_location">Student Location:</label>
                <input type="text" class="form-control" name="student_location" value="<?php echo $row['student_location']; ?>" required>
            </div>

            <div class="form-group">
                <label for="day">Day:</label>
                <input type="text" class="form-control" name="day" value="<?php echo $row['day']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="time_in">Time in:</label>
                <input type="text" class="form-control" name="time_in" value="<?php echo $row['time_in']; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_out">Time Out:</label>
                <input type="text" class="form-control" name="time_out" value="<?php echo $row['time_out']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Subject:</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
</html>
