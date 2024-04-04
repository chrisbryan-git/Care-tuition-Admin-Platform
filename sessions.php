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
    <title>Cares tuition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body{
            font-family:new times roman;
        }
        .fas{
            color:red;
            font-size:25px;
        }
        #session-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:15px !important;
        }
        
        .table-wrapper {
          max-height: 500px;
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
          
          /* margin-top:20px;
          margin-left:20px;
          margin-right:20px; */
        }
      
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 1px 1px 1px green;
          padding:50px;
        }
        
    </style>
       
</head>

<body>

    <!-- Sidebar -->
    <section id="session-side-bar">
        <div class="sidebar">
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
        
        <h3 id="header" style="font-family:monotype corsiva; color:green">Teachers' Lesson Count</h3>
        

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">TOTAL LESSONS:</h4>
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
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalStudents = $row["total_sessions"];
                    // echo "<h3>";
                    // echo  "Total Sessions:  ";
                    // echo  $totalStudents;
                    // echo "</h3>";                   
                    
                } else {
                    echo "0";
                }
                $conn->close();
                ?>
            </h2>
            </div>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="#" class="btn btn-primary"><?php 
                     echo  $totalStudents; 
                    ?></a>
                </div>
            </div>


            <!-- <div class="card" id="session-inactive-teachers">
                <div class="card-body">
                    <h4 class="card-title">Inactive teachers</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="#" class="btn btn-primary">Click me</a>
                </div>
            </div>             -->
            
        </div>      
        <?php

$conn = new mysqli('localhost', 'root', '', 'Cares database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT teacherName, COUNT(*) as count FROM teacher_student_schedule GROUP BY teacherName";
$result = $conn->query($sql);

?>

    <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px green;">
    <div class="table-container">
       <div class="table-wrapper">
        <table class="table">
          <thead>
            <tr>
            <th>Teacher's Name</th>
            <th>Number Of Lessons</th>
             <!-- <th>Total Amount Earned</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><i class='fas fa-chalkboard-teacher'></i> " . $row["teacherName"] . "</td>";
                    echo "<td>" . $row["count"] . "</td>";
                    // echo "<td>" . $row["count"]*1000 . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records in the table.</td></tr>";
            }
            
            ?>
        </tbody>
    </table>
</div>
</div>
</div>

<script>
document.addEventListener('input', function(event) {
    if (event.target.classList.contains('rate-input')) {
        const rateInput = event.target;
        const lessonCount = rateInput.dataset.lesson;
        const rowId = rateInput.dataset.rowId;
        const ratePerLesson = rateInput.value;
        const totalAmountElement = document.querySelector(`.total-amount[data-row-id='${rowId}']`);
        
        if (ratePerLesson && !isNaN(ratePerLesson)) {
            const totalAmount = parseFloat(lessonCount) * parseFloat(ratePerLesson);
            totalAmountElement.textContent = totalAmount.toFixed(2);
        } else {
            totalAmountElement.textContent = "Invalid Input";
        }
    }
});
</script>

</body>
</html>

<?php
$conn->close();
?>


        
        
    </section>

    <script src="main.js"></script>

</body>

</html>