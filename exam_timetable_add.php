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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>exam-timetable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Load custom CSS -->
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }
        h2 {
            margin-top: 100px;
            text-align: center;
        }
        h2{
            margin-top:5px;
        }
        .navbar{
            background-color:pink !important;
            margin-top:4px;
            width:100%;
        }
        .form-control{
            display:flex;
        }
        .container{
            margin-top:40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Exam Dates</h2>
        
        <form id="form" method="POST" action="connect_exam_timetable">
            <!-- Teacher name -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="teacher-name">Subject Teacher :</label>
                        <select class="form-control" id="teacher_name" name="teacher_name" required>
                            <option value="">Select subject teacher</option>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "Cares database");
                            $query = "SELECT teacherName FROM teacher_table";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (isset($_SESSION['inputs']['teacher-name']) && $_SESSION['inputs']['teacher-name'] == $row['teacherName']) {
                                    echo '<option value="' . $row['teacherName'] . '" selected>' . $row['teacherName'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['teacherName'] . '">' . $row['teacherName'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Student -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="student-name">Student's Name:</label>
                        <select class="form-control" id="student_name" name="student_name" required>
                            <option value="">Select Student doing exam</option>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "Cares database");
                            $query = "SELECT student_name FROM students_table";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (isset($_SESSION['inputs']['student-name']) && $_SESSION['inputs']['student-name'] == $row['student_name']) {
                                    echo '<option value="' . $row['student_name'] . '" selected>' . $row['student_name'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['student_name'] . '">' . $row['student_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" required />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Date of Exams">Date of Exams:</label>
                        <input type="date" class="form-control" id="date-of-exams" name="date-of-exams" required />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="student_location">Exam Center:</label>
                        <input type="text" class="form-control" id="exam_center" name="exam_center" required />
                    </div>
                </div>
                <!-- day -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="day">Day of Exam:</label>
                        <select class="form-control" id="day" name="day" required>
                            <option value="">Select Day...</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-6">         
                    <div class="form-group">
                        <label for="time-in">Exam Start Time:</label>
                        <input type="time" class="form-control" id="start_time" name="start_time"  />
                    </div>
                </div>
                <!-- Client -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="type_of_exam">Type Of Exam:</label>
                        <!-- <input type="text" class="form-control" id="type_of_exam" name="type_of_exam" /> -->
                        <select type="text" class="form-control" id="type_of_exam" name="type_of_exam" >
                            <option value="">Select exam</option>
                            <option value="CAT 1">CAT 1</option>
                            <option value="CAT 2">CAT 2</option>
                            <option value="CAT 3">CAT 3</option>
                            <option value="Random Assesment Test">Random Assesment Test</option>
                            <option value="Monthly CAT">Monthly CAT</option>
                            <option value="OPener Exam">Opener Exam</option>
                            <option value="Mid Term Exam">Mid Term Exam</option>
                            <option value="End Term 1 Exam">End Term 1 Exam</option>
                            <option value="End Term 2 Exam">End Term 2 Exam</option>
                            <option value="End Term 3 Exam">End Term 3 Exam</option>
                            <option value="Admission Exam">Admission Exam</option>
                            <option value="Random Exams">Random Exam</option>
                            <option value="Final Exams">Final Exams</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supervised-by">Exam Supervised By:</label>
                        <select class="form-control" id="supervised_by" name="supervised_by" required>
                            <option value="">Select exam supervisor</option>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "Cares database");
                            $query = "SELECT teacherName FROM teacher_table";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (isset($_SESSION['inputs']['teacher-name']) && $_SESSION['inputs']['teacher-name'] == $row['teacherName']) {
                                    echo '<option value="' . $row['teacherName'] . '" selected>' . $row['teacherName'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['teacherName'] . '">' . $row['teacherName'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
        <div class="form-group">
            <label for="Exam Out OF">Exam Out OF:</label>  
            <!-- <input type="number" class="form-control" id="exam_out_of" name="exam_out_of" />           -->
            <select class="form-control" id="exam_out_of" name="exam_out_of" >
                            <option value="0">Select Maximmum Score</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="75">75</option>
                            <option value="80">80</option>
                            <option value="100">100</option>
                            
                        </select>
        </div>
    </div>

            </div>
            <div class="row" >
                <div>
                <button type="submit" class="btn btn-primary" style="margin:20px;">Save</button>
                </div>
                <div>
                    <a href="exam_tabling" class="btn btn-secondary" style="margin:20px;">Exit</a>
                
                </div>
            </div>
           
        </form>
    </div>
    <script>
        document.getElementById("form").reset();
    </script>
</body>
</html>