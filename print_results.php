<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Times New Roman;
        }
        .report-card {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .school-name {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #007BFF;
        }
        .profile-picture {
            display: block;
            margin: 20px auto;
            max-width: 150px;
            border-radius: 50%;
            border: 2px solid #007BFF;
        }
        .student-info {
            font-size: 16px;
            margin: 20px 0;
        }
        .student-info div {
            margin-bottom: 10px;
        }
        .student-info strong {
            font-weight: bold;
            margin-right: 5px;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #333;
            color: #fff;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .subject-name {
            font-weight: bold;
        }
        .comment, .teacher-signature {
            margin-bottom: 20px;
        }
        .comment strong, .teacher-signature strong {
            font-weight: bold;
        }
        .school-stamps {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
        .report-container {
            position: relative;
        }
        .print-button {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }
        button {
            background-color: gray;
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
        }
        button:hover {
            background-color: lightblue;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
    <script>
        function printReportCard() {
            window.print();
        }
    </script>
</head>
<body>
    <?php
    // Database connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "omulodi54";
    $dbname = "school";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Assuming you have an "exam_scores" table with appropriate columns
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Fetch the data for the specific row with the given ID
        $sql = "SELECT * FROM exam_scores WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Output the report card for printing
            echo '<div class="report-card" style="border-radius:40px; margin-top:20px; margin-bottom:40px; box-shadow:2px 2px 2px 2px green;">';
            echo '<div class="header">';
            // echo '<div class="school-name"><img style="width:150px;" src="logo.jpg" alt="Logo"> </div>';
            echo '</div>';
            echo '<img src="logo.jpg" alt="Profile Picture" class="profile-picture">';
            echo '<div class="title" style="text-align:center;font-family:monotype corsiva;">Student Result Slip.</div>';
            echo '<hr>';
            echo '<div class="student-info">';
            echo '<div><strong>Student Name:</strong> ' . $row["student_name"] . '</div>';
            // echo '<div><strong>Student ID:</strong> ' . $row["id"] . '</div>';
            echo '<div><strong>Student Level:</strong> ' . $row["year_of_study"] . '</div>';
            echo '<div><strong>Date Of Exam:</strong> ' . $row["date"] . '</div>';
            echo '<div><strong>Exam Type:</strong> ' . $row["exam_type"] . '</div>';
            echo '<div><strong>Average Score:</strong> ' . $row["average_score"] . '%</div>';
            echo '<div><strong>Mean Grade:</strong> ' . $row["grade"] . '</div>';
            echo '</div>';
            echo '<hr>';
            echo '<div class="subject-scores" style="text-transform:uppercase;">';
            echo '<div class="table-wrapper">';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<td>SUBJECTS</td>';
            echo '<td>SCORE</td>';
            echo '<td>GRADE</td>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            // Assuming you store subject scores in a format like "subject: score"
            $subjectScores = explode(", ", $row["subjects_scores"]);
            foreach ($subjectScores as $subjectScore) {
                list($subject, $score) = explode(": ", $subjectScore);
                echo '<tr>';
                echo '<td class="subject-name">' . $subject . '</td>';
                echo '<td>' . $score . '</td>';
                $grade = '';
                if ($score >= 90) {
                    $grade = 'A+';
                } elseif ($score >= 80) {
                    $grade = 'A';
                } elseif ($score >= 70) {
                    $grade = 'B';
                } elseif ($score >= 60) {
                    $grade = 'C';
                } elseif ($score >= 50) {
                    $grade = 'D';
                } else {
                    $grade = 'F';
                }
                echo '<td>' . $grade . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
             echo '<div class="comment">';
            echo '<div><strong>Teacher\'s comments:</strong> ________________________</div>';
            echo '</div>';
            echo '<div class="teacher-signature">';
            echo '<div><strong>Teacher\'s Signature:</strong> ________________________</div>';
            echo '</div>';
            // School Stamps
            echo '<div class="school-stamps">';
            echo '<div><strong>School Stamp:</strong></div>';
            echo '</div>';
            // Close report card div
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <!-- Print button -->
    <div class="print-button">
        <button onclick="printReportCard()">Print Report Card</button>
        <a href="exams" class="btn btn-primary">Back</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>