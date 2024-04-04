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
    <title>timetable</title>
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
          box-shadow:  0px 0.5px green;
          padding:50px;
        }
        .fas{
  font-size: 35px;
  color: #FF0000;
}
body{
            font-family:new times roman;
        }
        #parent-card,#clock{
            margin-right:50px;
        }
        #student-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:15px !important;
        }
        #card-update{
            margin-right:43px;
        }
        #teacher-side-bar{
            margin-top:10px !important;
            margin-left:10px;
            border-radius:5px;
            margin-bottom:12px !important;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
<section id="teacher-side-bar" >
    <div class="sidebar" >
        <nav>
            <a href="home.php" class="sidebar-brand">
            <img src="logo.jpg" alt="" srcset="" style="width:150px; border-radius:20px;"> 
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
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="search">
                </div>
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
        <h3 id="header" style="font-family: 'monotype corssiva', cursive;"> Cares Teaching Timetable</h3>
        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Cares database";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT COUNT(*) as total_teachers FROM teacher_table";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalTeachers = $row["total_teachers"];
                    // echo "<p>Total Teachers: $totalTeachers</p>";
                } else {
                    echo "0";
                }
                $conn->close();
                ?>


        <div class="row">
        <div class="card">
                <div class="card-body">
                <h4 class="card-title">EXAM TIMETABLE</h4>
                <img src="images\icons8-invoice-64.png" alt="img">
                <a href="exam_tabling.php" class="btn btn-primary" onclick=" ">View Here</a>
            
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                <h4 class="card-title">EXAM TIMETABLE</h4>
                <img src="images\icons8-invoice-64.png" alt="img">
                <a href="exam_timetable_add.php" class="btn btn-primary" onclick=" ">Update Here</a>
            
                </div>
            </div>
        
        
            <div class="card" id="card-update">
                <div class="card-body">
                    <h4 class="card-title">TEACHING TIMETABLE</h4>
                    <img src="images\icons8-invoice-64.png" alt="img">
                    <a href="timetable_add.php" class="btn btn-primary" onclick=" ">Update Here</a>
                </div>
            </div>
        </div>
        </div>

        <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px green;">
    <div class="table-container">
         <div class="table-wrapper">
        <table class="table">
            <h4>Teaching Timetable</h4>
            <thead>
                <tr>
                    <td>Teacher Name</td>
                    <td>Student Name</td> 
                    <td>Subject</td>
                    <td>Day</td>                    
                    <td>Time in</td>
                    <td>Time Out</td>
                    <td>Class Location</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>

            <?php
    
    $conn = mysqli_connect("localhost", "root", "", "Cares database");
  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $currentDay = date("l");

    
    $sql = "SELECT * FROM timetable ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td class="students">';
            echo '<i class="fas fa-user-graduate"></i>';
            // echo '<img src="images/' . $row['id'] . '.png" alt="images/' . $row['id'] . '.png">';
            echo '<div class="people">';
            echo '<h5>' . $row['teacher_name'] . '</h5>';
            echo '</div>';
            echo '</td>';
            echo '</td>';
            echo '<td class="class">';
            echo '<h5>' . $row['student_name'] . '</h5>';
            echo '</td>';
            echo '<td class="class">';
            echo '<h5>' . $row['phone'] . '</h5>'; //This is subject field
            echo '</td>';
            echo '<td class="day">';
            echo '<h5>' . $row['day'] . '</h5>';
            echo '<td>';
            echo '<h5>' . $row['time_in'] . '</h5>';
            echo '</td>';
            echo '<td>';
            echo '<h5>' . $row['time_out'] . '</h5>';
            echo '</td>';
             echo '<td class="Location">';
             echo '<h5>' . $row['student_location'] . '</h5>';
            echo '<td>';
            echo '<a class="edit-btn" href="edit_timetable?id=' . $row['id'] . '">Edit</a>';
            echo '<a class="delete-btn" href="delete_timetable?id=' . $row['id'] . '">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo "</table>";
    } else {
        echo "There are no classes today!.";
    }
    mysqli_close($conn);
    ?>


            </tbody>
        </table>
    </div>
    </div>
    </div>
    </section>

    <script src="main.js"></script>

</body>

</html>