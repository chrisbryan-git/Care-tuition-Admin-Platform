<?php
$servername = "localhost";
$username = "root";
$password = "omulodi54";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $studentName = $_POST['studentName'];
    $examType = $_POST['exam_type'];
    $examDate = $_POST['exam_date'];

    // Define an array of subjects
    $subjects = [
        'maths', 'english', 'biology', 'physics', 'chemistry', 'science',
        'geography', 'history', 'ict', 'accounting', 'religion',
        'homescience', 'programming', 'swahili', 'indig'
    ];

    // Initialize an array to store subject scores
    $subjectScores = [];
    $subjectCount = 0; // Count of subjects with valid scores
    $totalScore = 0; // Total score of subjects with valid scores

    foreach ($subjects as $subject) {
        $score = isset($_POST[$subject]) ? $_POST[$subject] : 'N/A';
        
        // Check if the score is not 'N/A', and if not, add it to the total score
        if ($score !== 'N/A') {
            $subjectScores[] = "$subject: $score";
            $scoreValue = intval($score);
            $totalScore += $scoreValue;
            $subjectCount++;
        }
    }

    // Calculate the average score based on subjects with valid scores
    $averageScore = $subjectCount > 0 ? $totalScore / $subjectCount : 0;

    // Calculate the grade based on the average score (you may have your own grading logic)
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

    // Update the record in the database
    $updateSql = "UPDATE exam_scores SET
                  student_name = '$studentName', 
                  exam_type = '$examType',
                  date = '$examDate',
                  subjects_scores = '" . implode(", ", $subjectScores) . "',
                  average_score = $averageScore,
                  grade = '$grade'
                  WHERE id = $id";

if ($conn->query($updateSql) === TRUE) {
    // Fetch the updated record from the database
    $selectUpdatedSql = "SELECT * FROM exam_scores WHERE id = $id";
    $updatedResult = $conn->query($selectUpdatedSql);
    $updatedRow = $updatedResult->fetch_assoc();

    // Recalculate the average score for the updated record
    $updatedSubjectScores = explode(", ", $updatedRow["subjects_scores"]);
    $updatedTotalScore = 0;
    $updatedSubjectCount = 0;

    foreach ($updatedSubjectScores as $updatedSubjectScore) {
        list($subj, $subjScore) = explode(": ", $updatedSubjectScore);
        $score = intval($subjScore);

        // Check if the score is not 'N/A', and if not, add it to the total score
        if ($score !== 'N/A') {
            $updatedTotalScore += $score;
            $updatedSubjectCount++;
        }
    }

    // Calculate the updated average score
    $updatedAverageScore = $updatedSubjectCount > 0 ? $updatedTotalScore / $updatedSubjectCount : 0;

    // Update the average score in the database
    $updateAverageSql = "UPDATE exam_scores SET average_score = $updatedAverageScore WHERE id = $id";
    if ($conn->query($updateAverageSql) === TRUE) {
        echo "<script>alert('Successfully updated!');window.location.href='exam_table.php'; </script>";
            exit;
        // header("Location: exam.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error updating average score: " . $conn->error;
    }
} else {
    echo "Error updating record: " . $conn->error;
}}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the existing record from the database
$selectSql = "SELECT * FROM exam_scores WHERE id = $id";
$result = $conn->query($selectSql);
$row = $result->fetch_assoc();

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_exam_record</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body{
            font-family:Times new roman;
        }
        .form-control{
            width:90%;
            }
            .form-label{
                font-weight:bold;
            }
            .btn{
                width:100px;
                margin-top:20px;
            }
            .container{
                margin-top:20px;
            }
            h3{
                text-align:center;
            }
    </style>
</head>
<body>
    <div class="container">
        <h3>Edit Student Record</h3>
        <form method="post">
            
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <!-- Add fields for student name, student ID, and year of study -->
            <div class="row">
            <div class="col-md-4">
                <label for="studentName" class="form-label">Student Name:</label>
                <input type="text" id="studentName" name="studentName" class="form-control" value="<?php echo isset($row['student_name']) ? $row['student_name'] : ''; ?>">
            </div>
            <div class="col-md-4">
                <label for="exam_type" class="form-label">Exam Type</label>
                <input type="text" name="exam_type" class="form-control" value="<?php echo isset($row['exam_type']) ? $row['exam_type'] : ''; ?>">
             </div>
             </div>

             <div class="row">
             <div class="col-md-4">
                <label for="exam_date" class="form-label">Exam Date</label>
                <input type="text" name="exam_date" class="form-control" value="<?php echo isset($row['date']) ? $row['date'] : ''; ?>">
            </div>
            <!-- Generate input fields for each subject score using array keys -->
            <?php
            $subjectScores = explode(", ", $row["subjects_scores"]);
            $subjects = [
                'maths', 'english', 'biology', 'physics', 'chemistry', 'science',
                'geography', 'history', 'ict', 'accounting', 'religion',
                'homescience', 'programming', 'swahili', 'indig'
            ];
            foreach ($subjects as $subject) {
                $score = "N/A"; // Default value if subject not found
                foreach ($subjectScores as $subjectScore) {
                    $subjectData = explode(": ", $subjectScore);
                    // list($subj, $subjScore) = explode(": ", $subjectScore);
                    if (count($subjectData) === 2 && $subject === $subjectData[0]) {
                    // if ($subject === $subj) {
                        $score = $subjectData[1];
                        // $score = $subjScore;
                        break; // Exit the inner loop once the subject is found
                    }
                }
                ?>
                <div class="col-md-4">
                    <label for="<?php echo $subject; ?>" class="form-label"><?php echo ucfirst($subject); ?></label>
                    <input type="text" name="<?php echo $subject; ?>" class="form-control" value="<?php echo isset($score) ? $score : ''; ?>">
                </div>
                <?php 
            } 
            ?>
            <input type="submit" value="Save" class="btn btn-primary">
        </form>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>