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
    <title>Timetable</title>

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
    <!-- <div class="container"> -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="home" class="btn btn-secondary">Home</a>
                </li>

                <li class="nav-item">&nbsp;</li>

                <li class="nav-item">
                    <a href="alltimetable" class="btn btn-secondary">View TimeTable</a>
                </li>
            </ul>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav> -->

        

        <div class="container">
        <h2>Cares Timetable</h2>
                <form id="form" method="POST" action="timetable_connect">
                    <!-- Teacher name -->
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    
                        <label for="teacher-name">Teacher's Name:</label>
                        <select class="form-control" id="teacher-name" name="teacher-name" required>
                            <option value="">Select Teacher</option>
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
                        <select class="form-control" id="student-name" name="student-name" required>
                            <option value="">Select Student</option>
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
                        <label for="student_location">Student Location:</label>
                        <input type="text" class="form-control" id="student_location" name="student_location" required />
                    </div>
                    </div>

                    <!-- day -->
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="day">Day:</label>
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
                <label for="time-in">Time IN:</label>
                <input type="time" class="form-control" id="time-in" name="time-in" required />
            </div>
            </div>

            <!-- Client -->
            <div class="col-sm-6">
            <div class="form-group">
                <label for="time-out">Time OUT:</label>
                <input type="time" class="form-control" id="time-out" name="time-out" required />
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label for="phone">Subject:</label>
                <input type="text" class="form-control" id="phone" name="phone" required />
            </div>
            </div>
            </div>
            <div class="row" >
                <div>
                <button type="submit" class="btn btn-primary" style="margin:20px;">Save</button>
                </div>
                <div>
                    <a href="timetable" class="btn btn-secondary" style="margin:20px;">Exit</a>
                
                </div>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
            </div>
        </body>
    <script>
    document.getElementById("form").reset(); 
</script>
    </html>
