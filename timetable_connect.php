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
$teacherName = $_POST['teacher-name'];
$studentName = $_POST['student-name'];
$studentLocation = $_POST['student_location'];
$day = $_POST['day'];
$timeIn = $_POST['time-in'];
$timeOut = $_POST['time-out'];
$phone = $_POST['phone'];

$conn = mysqli_connect('127.0.0.1', 'root', '', 'Cares database');

$stmt = $conn->prepare("INSERT INTO timetable (teacher_name, student_name, student_location, day, time_in, time_out, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssss", $teacherName, $studentName, $studentLocation, $day, $timeIn, $timeOut, $phone);
$stmt->execute();

if ($stmt) {  
    $stmt->close();
    $conn->close();
    echo '<script>alert("Data inserted successfully!");</script>';
    
    echo '<script>window.location.href = "timetable";</script>';
} else {
    
    echo '<div class="alert alert-danger" role="alert">Error: Unable to insert data.</div>';
}

?>


