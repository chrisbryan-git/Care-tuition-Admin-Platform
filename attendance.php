
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
    <title>attendance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
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
        .delete-btn {
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }
        body{
            font-family:Times new roman;
        }
        #attendance-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:15px !important;
        }
        .table-wrapper {
          max-height: 520px;
          /* Adjust the height as per your requirement */
          overflow-y: scroll;
          overflow-x: scroll;
        }
        .table-container {
          overflow-x: auto;
          max-width: 100%;
        }
        .table {
          width: 80%;
          margin-top:20px;
          margin-left:20px;
          margin-right:20px;
        }
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow:  0px 0.5px blue;
          padding:50px;
        }
        #header{
            padding-top:100px;
        }
        #list-date{
            margin-right:50px;
            
        }
        
    </style>
</head>

<body>

    <!-- Sidebar -->
    <section id="attendance-side-bar">
        <div class="sidebar">
            <nav>
                <a href="index.html" class="sidebar-brand">                
                <img src="logo.jpg" alt="" srcset="" style="width:150px; border-radius:20px;"> 
                </a>
                <div class="sidebar-menu">
                <li><i class="fa-solid fa-gauge sidebarBtn" ></i><a href="home.php">Dashboard</a></li>
            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="students.php">Students</a></li>
            <li><i class="fas fa-chalkboard-teacher"></i><a href="Teachers.php">Teacher</a></li>
            <!-- <LI><i class="fa-solid fa-clipboard-user"></i><a href="student2#showActive">Stud</a></LI> -->
            <LI><i class="fa-solid fa-clipboard-user"></i><a href="exams.php">Exams</a></LI>
            <li><i class="fa-solid fa-school"></i><a href="Attendance.php">Attendance</a></li>
            <!-- <li><i class="fa-solid fa-money-check-dollar"></i><a href="Fees">Fees/Invoices</a></li> -->
            <li><i class="fa-solid fa-book"></i><a href="timetable.php">Timetable</a></li>
            <!-- <li><i class="fa-regular fa-user"></i><a href="users">Users</a></li> -->
            <li><i class="fa-solid fa-calendar-days"></i><a href="Sessions.php">Sessions</a></li>
            <!-- <li><i class="fa fa-flag" aria-hidden="true"></i><a href="reports">Reports</a></li> -->
            <li><i class="fa fa-sign-out"></i><a href="logout.php">Log out</a></li>
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
                <form action="" method="get">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" name="search" placeholder="search">
                </div>
                <div>
                <!-- <button type="submit" class="btn btn-primary">Search</button> -->
              </div>
                </form>
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
            
            <div class="row" id="header" style="font-family:monotype corsiva; color:green">
                <div>TEACHERS ATTENDANCE LIST</div>
                <div >
                <h2 class="numbers">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Cares database";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT COUNT(*) as total_sessions FROM teacher_student_schedule";
                $result = $conn->query($sql);
                if ($result->num_rows > 0  ) {
                    $row = $result->fetch_assoc();
                    $totalStudents = $row["total_sessions"];
                    echo "<h3>";
                    echo  "Total Sessions:  ";
                    echo  $totalStudents;
                    echo "</h3>";                   
                    
                } else {
                    echo "0";
                }
                $conn->close();
                ?>
            </h2>
            </div>
                <div id="list-date"><?php  echo date("d F Y");?></div>
                
                <!-- <h3 > </h3> -->
            </div>
                
        <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px green;">
        
        <div class="table-container">
         <div class="table-wrapper">
        <table class="table">
                <thead>
                    <tr>
                         <th>No.</th>
                        <th>TEACHER NAME</th>
                        <th>STUDENT NAME</th>
                        <th>DATE</th>
                        <th>TIME IN</th>
                        <th>TIME OUT</th>
                        <th>SUBJECT</th>
                        <th>TOPIC</td>
                        <th>SUBTOPIC</th>
                        <th>COMMENTS</th>
                        <th>ACTION</th>
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

                    $sql = "SELECT id, teacherName, studentName, date, timeIn, timeOut, subject, topic, subtopic, comments FROM teacher_student_schedule";

                    $result = $conn->query($sql);
                    $counter = +1;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo "<td>" . $counter . "</td>";
                            // echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['teacherName'] . '</td>';
                            echo '<td>' . $row['studentName'] . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td>' . $row['timeIn'] . '</td>';
                            echo '<td>' . $row['timeOut'] . '</td>';
                            echo '<td>' . $row['subject'] . '</td>';
                            echo '<td>' . $row['topic'] . '</td>';
                            echo '<td>' . $row['subtopic'] . '</td>';
                            echo '<td>' . $row['comments'] . '</td>';
                            echo '<td>';
                            echo '<a class="edit-btn" href="edit_attendance?id=' . $row['id'] . '">Edit</a>';
                            echo '<a class="delete-btn" href="delete_attendance?id=' . $row['id'] . '">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                            $counter++;
                        }
                    } else {
                        echo '<tr><td colspan="9">No records found</td></tr>';
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
   

    <script src="main.js"></script>
</body>
</html>
