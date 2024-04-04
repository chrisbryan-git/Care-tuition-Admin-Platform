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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacherName = $_POST["teacher_name"];
    $studentName = $_POST["student_name"];
    $subject = $_POST["subject"];
    $dateOfExams = $_POST["date-of-exams"];
    $examCenter = $_POST["exam_center"];
    $day = $_POST["day"];
    $startTime = $_POST["start_time"];
    $typeofexam = $_POST["type_of_exam"];
    $supervisor = $_POST["supervised_by"];
    $examoutof = $_POST["exam_out_of"];
    $conn = mysqli_connect("localhost", "root", "", "Cares database");
    $query = "SELECT * FROM exam_timetable WHERE teacher_name = '$teacherName' AND student_name = '$studentName' AND subject = '$subject' AND date_of_exams = '$dateOfExams' AND exam_center = '$examCenter' AND day = '$day' AND start_time = '$startTime' AND type_of_exam = '$typeofexam' AND supervised_by = '$supervisor' AND exam_out_of = '$examoutof'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {        
        echo "<script>alert('Duplicate entry!');</script>";
    } else {        
        $insertQuery = "INSERT INTO exam_timetable (teacher_name, student_name, subject, date_of_exams, exam_center, day, start_time, type_of_exam, supervised_by,exam_out_of) VALUES ('$teacherName', '$studentName', '$subject', '$dateOfExams', '$examCenter', '$day', '$startTime', '$typeofexam', '$supervisor','$examoutof')";
        if (mysqli_query($conn, $insertQuery)) {
            
            echo "<script>alert('Exam timetable added successfully!');
            window.location='exam_timetable_add'</script>";
        } else {
            
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
    
    mysqli_close($conn);
}
?>