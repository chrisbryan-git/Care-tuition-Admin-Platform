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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exam_table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            font-family: Times new roman;
        }
        .table-wrapper {
          max-height: 400px;
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 100% !important;
          margin-top: 20px;
          margin-right: 20px;
        }
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 1px 1px 1px pink;
          padding: 50px;
        }
        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap; /* Prevent text wrapping */
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .edit-btn,
        .delete-btn,
        .print-btn {
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }
        .delete-btn {
            background-color: red;
        }
        .print-btn{
            background-color: grey;
        }
        @media (max-width: 600px) {
            /* Make the table responsive at smaller screen sizes */
            table {
                overflow-x: auto;
            }
            th,
            td {
                white-space: initial;
            }
        }
        h4{
            text-align:center;
            margin-top:40px;
        }
        a{
            margin-left:50px;
            margin-top:10px;
        }
    </style>
</head>
<body>
<h4>Students Exam Performance Table</h4>
    <div class="table-container">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th style="position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;">ID</th> 
                        <th style="position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;">Name</th>
                        <th>Exam type</th>
                        <th>Date</th>
                        <th>Maths</th>
                        <th>English</th>
                        <th>Biology</th>
                        <th>Physics</th>
                        <th>Chemistry</th>
                        <th>Science</th>
                        <th>Geography</th>
                        <th>History</th>
                        <th>ICT/Computer Science</th>
                        <th>B.Studies/Accounting</th>
                        <th>Religion</th>
                        <th>Home Science</th>
                        <th>Programming</th>
                        <th>Swahili</th>
                        <th>Indigenous/Foreign Lang</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Cares database";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM exam_scores";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='row-" . $row["id"] . "'>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td style=\"position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;\">" . strtoupper($row["student_name"]) . "</td>";
                        echo "<td>" . $row["exam_type"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        $subjectScores = explode(", ", $row["subjects_scores"]);
                        $subjects = [
                            "maths", "english", "biology", "physics", "chemistry", "science",
                            "geography", "history", "ict", "accounting", "religion",
                            "homescience", "programming", "swahili", "indig"
                        ];
                        foreach ($subjects as $subject) {
                            $score = "N/A"; // Default value if subject not found
                            foreach ($subjectScores as $subjectScore) {
                                $subjectData = explode(": ", $subjectScore);
                                if (count($subjectData) === 2 && $subject === $subjectData[0]) {
                                    $score = $subjectData[1];
                                    break;
                                }
                            }
                            echo "<td>" . $score . "</td>";
                        }
                        echo "<td>" . $row["grade"] . "</td>";
                        echo '<td>';
                        echo '<a class="edit-btn" href="edit_exam?id=' . $row['id'] . '">Edit</a>';
                        echo '<a class="delete-btn" href="delete_exam?id=' . $row['id'] . '">Delete</a>';
                        echo '<a class="print-btn" href="print_results?id=' . $row['id'] . '">Print</a>';
                        echo '</td>';
                        echo "</tr>";
                    }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
                } else {
                    echo 'Record not found.';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
<a href="students" class="btn btn-primary">Back</a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>