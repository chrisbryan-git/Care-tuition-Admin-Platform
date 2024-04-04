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
    $studentName = $_POST['studentName'];
    $studentId = $_POST['studentId'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $date = $_POST['date'];
    $examType = $_POST['examType'];
    // Initialize an array to store subjects and their scores
    $subjects = [];
    // Define an array of subject names
    $subjectNames = [
        "maths", "english", "biology", "physics", "chemistry", "science",
        "geography", "history", "ict", "accounting", "religion", "homescience",
        "programming", "swahili", "indig"
    ];
    // Calculate the total score and count the number of subjects
    $totalScore = 0;
    $subjectCount = 0;
    foreach ($subjectNames as $subject) {
        if (isset($_POST[$subject])) {
            $score = intval($_POST[$subject]);
            $naChecked = isset($_POST["{$subject}_na"]) ? 1 : 0;
            // Check if N/A is checked, and if not, add the subject and score to the array
            if (!$naChecked) {
                $subjects[] = "$subject: $score";
                $totalScore += $score;
                $subjectCount++;
            }
        }
    }
    // Calculate the average score
    $averageScore = $subjectCount > 0 ? $totalScore / $subjectCount : 0;
    // Define a simple grading system (you can customize this as needed)
    $grade = '';
    if ($averageScore >= 90) {
        $grade = 'A+';
    } elseif ($averageScore >= 80) {
        $grade = 'A';
    } elseif ($averageScore >= 70) {
        $grade = 'B';
    } elseif ($averageScore >= 60) {
        $grade = 'C';
    } elseif ($averageScore >= 50) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }
    // Combine subjects into one entry
    $subjectEntry = implode(", ", $subjects);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Cares database";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Check if a record already exists with the same student name, year of study, date, and exam type
    $checkSql = "SELECT * FROM exam_scores WHERE student_name = ? AND year_of_study = ? AND date = ? AND exam_type = ? AND subjects_scores = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("sissi", $studentName, $yearOfStudy, $date, $examType, $subjectEntry);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Duplicate entry found. Please check your input.');window.location.href='examform'; </script>";
        exit(); // Prevent further execution
    } else {
        // Insert the record if no duplicate entry found
        $sql = "INSERT INTO exam_scores (student_name, year_of_study, date, exam_type, subjects_scores, average_score, grade)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssds", $studentName, $yearOfStudy, $date, $examType, $subjectEntry, $averageScore, $grade);
        if ($stmt->execute()) {
            echo "<script>alert('Successfully entered scores!');window.location.href='examform'; </script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $checkStmt->close();
    $conn->close();
}
?>