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
    $sql = "SELECT teacher_name, student_name, subject, date_of_exams, exam_center,day,start_time,type_of_exam,supervised_by,exam_out_of FROM exam_timetable WHERE id = '$id' ";
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
    $newSubject = $_POST['subject'];
    $newDate = $_POST['date_of_exams'];
    $newCenter = $_POST['exam_center'];
    $newDay = $_POST['day'];
    $newTime = $_POST['start_time'];
    $newTypeOfExam = $_POST['type_of_exam'];
    $newSupervised = $_POST['supervised_by'];
    $newExamOutOf = $_POST['exam_out_of'];
   

    $updateSql = "UPDATE exam_timetable SET teacher_name = '$newTeacherName', student_name = '$newStudentName', subject = '$newSubject', date_of_exams = '$newDate',exam_center='$newCenter',day='$newDay',start_time='$newTime', type_of_exam = '$newTypeOfExam', supervised_by = '$newSupervised', exam_out_of = '$newExamOutOf' WHERE id = '$id'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Information updated successfully.";
        header("Location: exam_tabling");
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
    <title>edit_exam_timetable</title>
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
        <h2>Edit Exam Timetable</h2>
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
                <label for="student_location">Subject:</label>
                <input type="text" class="form-control" name="subject" value="<?php echo $row['subject']; ?>" required>
            </div>

            <div class="form-group">
                <label for="day">Date Of Exams:</label>
                <input type="text" class="form-control" name="date_of_exams" value="<?php echo $row['date_of_exams']; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_in">Exam Center:</label>
                <input type="text" class="form-control" name="exam_center" value="<?php echo $row['exam_center']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Day Of Exams">Day Of Exams:</label>
                <input type="text" class="form-control" name="day" value="<?php echo $row['day']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Start Time:</label>
                <input type="text" class="form-control" name="start_time" value="<?php echo $row['start_time']; ?>" required>
            </div>

            <div class="form-group">
                <label for="Type Of Exam">Type OF Exam:</label>
                <input type="text" class="form-control" name="type_of_exam" value="<?php echo $row['type_of_exam']; ?>" required>
            </div>

            <div class="form-group">
                <label for="Supervised By">Supervised By:</label>
                <input type="text" class="form-control" name="supervised_by" value="<?php echo $row['supervised_by']; ?>" required>
            </div>

            <div class="form-group">
                <label for="Exam Out of">Exam out of:</label>
                <input type="text" class="form-control" name="exam_out_of" value="<?php echo $row['exam_out_of']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
</html>
