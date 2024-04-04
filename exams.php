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
    <title>Cares digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body{
            font-family:new times roman;
        }
        #student-card{
            margin-right:50px;
        }
        #student-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:15px !important;
        }
        .edit-btn{
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        } 
        .delete-btn,.print-btn{
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }
        .table-wrapper {
          max-height: 400px;
          /* Adjust the height as per your requirement */
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 100%; 
          /* margin-top:20px;  */
          /* margin-left:20px; */
          /* margin-right:20px; */
        }
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow:  0px 0.5px blue;
          padding:50px;
        }
        .fas{
  font-size: 35px; 
  color: #FF0000; 
}
.print-btn{
            background-color: grey;
        }

    </style>

</head>

<body>

    <!-- Sidebar -->
    <section id="student-side-bar">
        <div class="sidebar">
            <nav>
                <a href="index.html" class="sidebar-brand">
                    <img src="logo.jpg" alt="" srcset="" style="width:150px; border-radius:20px;">                  
                    <!-- <i class="fas fa-graduation-cap learning-institution-icon">Cares Tuition</i> -->
                </a>
                <div class="sidebar-menu">
                <li><i class="fa-solid fa-gauge sidebarBtn" ></i><a href="home.php">Dashboard</a></li>
            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="students.php">Students</a></li>
            <li><i class="fas fa-chalkboard-teacher"></i><a href="teachers.php">Teacher</a></li>
            <!-- <LI><i class="fa-solid fa-clipboard-user"></i><a href="student2#showActive">Stud</a></LI> -->
            <LI><i class="fa-solid fa-clipboard-user"></i><a href="exams.php">Exams</a></LI>
            <li><i class="fa-solid fa-school"></i><a href="attendance.php">Attendance</a></li>
            <!-- <li><i class="fa-solid fa-money-check-dollar"></i><a href="Fees">Fees/Invoices</a></li> -->
            <li><i class="fa-solid fa-book"></i><a href="timetable.php">Timetable</a></li>
            <!-- <li><i class="fa-regular fa-user"></i><a href="users">Users</a></li> -->
            <li><i class="fa-solid fa-calendar-days"></i><a href="sessions.php">Sessions</a></li>
            <!-- <li><i class="fa fa-flag" aria-hidden="true"></i><a href="reports">Reports</a></li> -->
            <li><i class="fa fa-sign-out"></i><a href="logout">Log out</a></li>
            </div>
        </nav>
            </nav>
        </div>
    </section>

    <!-- Navbar -->
    <section id="navigation">
        <div class="navbar-brand">
            <div class="nav">
                <div>
                    <i id="sidebar-btn" class="fas fa-bars"></i>
                </div>
                <div class="search">
  <i class="fa fa-search"></i>
  <input readonly type="text" id="searchInput" placeholder="search" onkeyup="searchDatabase()">
</div>

<div id="searchResults"></div>

            </div>
            <div class="profile">
            
                <div class="dropdown">
                    <a href="#"><i class="fa fa-envelope message_Icon"></i></a>
            
                    <div class="dropdown-content">
                        <h3>New Messages</h3><br>
                        <p>Hello! You have some new messages.</p>
                    </div>
                </div>
            
                <div class="dropdown">
                    <a href="#"><i class="fa fa-bell notifications"></i></a>
                    <div class="dropdown-content">
                        <h3>New notifications</h3>
                    </div>
                </div>
                <div class="dropdown">
                    <img src="images\illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                        alt="Profile Picture">
                    <div class="dropdown-content">
                        <a href="#">My Profile</a>
                        <a href="#">Settings</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
            </div>
            </div>
        <h3 id="header" style="font-family: 'monotype corssiva', cursive;"> Students and Exams</h3>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Exam Scores</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="examform.php" class="btn btn-primary">Click Here</a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Exam Dates</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="exam_tabling.php" class="btn btn-primary">Click Here</a>
                </div>
            </div>


            <div class="card" id="student-card">
                <div class="card-body">
                    <h4 class="card-title">View Exam Graph</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="reports.php" class="btn btn-primary">Click Here</a>
                </div>
            </div>
        </div>
        </div>


        <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px green;">
    <div class="table-container">
         <div class="table-wrapper">
        <table class="table">
            <!-- <h4>Exams</h4> -->
            <thead>
                <tr style="text-transform:uppercase;margin:50px;">
                <th style="position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;">ID</th> 
                        <th style="position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;">Name</th>
                        <th style="padding:20px;">Exam type</th>
                        <th style="padding:20px;">Date</th>
                        <th style="padding:20px;">Year/Form</th>
                        <th style="padding:20px;">Maths</th>
                        <th style="padding:20px;">English</th>
                        <th style="padding:20px;">Biology</th>
                        <th style="padding:20px;">Physics</th>
                        <th style="padding:20px;">Chemistry</th>
                        <th style="padding:20px;">Science</th>
                        <th style="padding:20px;">Geography</th>
                        <th style="padding:20px;">History</th>
                        <th style="padding:20px;">ICT/Computer Science</th>
                        <th style="padding:20px;">B.Studies/Accounting</th>
                        <th style="padding:20px;">Religion</th>
                        <th style="padding:20px;">Home Science</th>
                        <th style="padding:20px;">Programming</th>
                        <th style="padding:20px;">Swahili</th>
                        <th style="padding:20px;">Indigenous/Foreign Lang</th>
                        <th style="padding:20px;">Average Score</th>
                        <th style="padding:20px;">Grade</th>
                        <th style="position: sticky; right: 0; z-index: 1; background-color: #f7f7f7;">Actions</th>
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
                $counter=1;
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='row-" . $row["id"] . "'>";
                        echo "<td>" . $counter. "</td>";
                        // echo "<td>" . $row["id"] . "</td>";
                        echo "<td style=\"position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;\">" . strtoupper($row["student_name"]) . "</td>";
                        echo "<td>" . $row["exam_type"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["year_of_study"] . "</td>";
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
                        echo "<td>" . $row["average_score"] . "</td>";
                        echo "<td>" . $row["grade"] . "</td>";
                        echo '<td style="position: sticky; right: 0; z-index: 1; background-color: #f7f7f7;">';                        
                        echo '<a class="edit-btn" href="edit_exam?id=' . $row['id'] . '">Edit</a>';
                        echo '<a class="delete-btn" href="delete_exam?id=' . $row['id'] . '">Delete</a>';
                        echo '<a class="print-btn" href="print_results?id=' . $row['id'] . '">Print</a>';
                        echo '</td>';
                        echo "</tr>";
                        $counter++;
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    </section>    
</body>
</html>

