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
    <title>cares digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body{
            font-family:new times roman !important;
        }
        #teacher-card{
            margin-right:50px;
        }
        #teacher-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:15px !important;
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
          /* width: 50%;
          margin-top:20px;
          margin-left:20px;
          margin-right:20px; */
        }

        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 2px 2px 2px green;
          padding:50px;
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
        .teacher-row.inactive {
          background-color: red;
          color: white;
        }
        .fas{
  font-size: 35px; 
  color: blue; 
}
    </style>
</head>

<body>

    <!-- Sidebar -->
    <section id="teacher-side-bar">
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
            <!-- <li><i class="fa fa-sign-out"></i><a href="logout">Log out</a></li> -->
            </div>
        </nav>
            </nav>
        </div>
    </section>

    <!-- Navbar -->
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
            <div>
                <div class="row">
            <div>Logged in as:</div>
            <div><h2 style="text-transform: capitalize;font-family: 'Monotype Corsiva';"><?php echo '<span style="color: green;">' . $_SESSION['username'] . '!</span>'; ?>
        </div>
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

        <h3 id="header" style="font-family: 'monotype corssiva', cursive;">All students </h3>


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Active Students</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="#" class="btn btn-primary" id="showActive">Click Here</a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">inactive Students</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="#" class="btn btn-primary" id="showInactive">Click me</a>
                </div>
            </div>


            <div class="card" id="teacher-card">
                <div class="card-body">
                    <h4 class="card-title">Add Student</h4>
                    <!-- <i class="fas fa-user-graduate"></i> -->
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="students_form.php" class="btn btn-primary">Click Here</a>
                </div>
            </div>
        </div>
        </div>

        <div class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px green;">
            <div class="table-container">
                <div class="table-wrapper">
                    <table class="table">
                        <!-- <h4>All Students</h4> -->
                        <hr>
                        <thead>
                            <tr style="font-weight:bold;">
                            <td style="position: sticky; left: 0; z-index: 1; background-color: #f7f7f7;"></td>
                            <td style="position: ;">Student's Name</td>
                            <td>Class/form</td>
                             <td>Type of program</td>
                            <td>Subjects</td>
                            <td>Date Of Admission</td>
                            <td>Parent Name</td>
                            <td>Phone Number</td>
                            <td>Parent Email</td>
                            <td>Location</td>
                            <td>Inactive</td>
                            <td style="position: sticky; right: 0; z-index: 1; background-color: #f7f7f7;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "Cares database";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // SQL query to retrieve data from teacher_table
                            $sql = "SELECT * FROM students_table";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='teacher-row'>";
                                    echo '<td>';
                                    echo '<i class="fas fa-user-graduate"></i>';
                                    echo '</td>';
                                    echo "<td style=\"position: sticky; left: 0; z-index: 0; background-color: #f7f7f7; color:blue;\">" . $row['student_name'] . "</td>";
                                    // echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['class'] . "</td>";
                                    echo "<td>" . $row['type_of_program'] . "</td>";
                                    echo "<td>" . $row['subjects_to_be_taught'] . "</td>";
                                    echo "<td>" . $row['date_of_admission'] . "</td>";
                                    echo "<td>" . $row['parent_name'] . "</td>";
                                    echo "<td>" . $row['phone_number'] . "</td>";
                                    echo "<td>" . $row['parent_email'] . "</td>";
                                    echo "<td>" . $row['location_address'] . "</td>";
                                    // echo "<td>" . $row[''] . "</td>";
                                    echo "<td>";
                                    echo '<input type="checkbox" class="inactive-checkbox" data-teacher-id="' . $row['id'] . '">';
                                    echo "</td>";
                                    echo '<td style="position: sticky; right: 0; z-index: 0; background-color: #f7f7f7;">';
                        echo '<a class="edit-btn" href="edit_student?id=' . $row['id'] . '">Edit</a>';
                        echo '<a class="delete-btn" href="delete_student?id=' . $row['id'] . '">Delete</a>';
                        echo '</td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No students found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </section>
    <script>
        // Add an event listener for the checkbox change event
        const checkboxes = document.querySelectorAll('.inactive-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const teacherId = this.getAttribute('data-teacher-id');
                const isChecked = this.checked;

                // Save the checkbox state in local storage
                localStorage.setItem(`teacher_${teacherId}_inactive`, isChecked);

                // Add or remove a class to make the row inactive/active
                const row = this.closest('.teacher-row');
                if (isChecked) {
                    row.classList.add('inactive');
                } else {
                    row.classList.remove('inactive');
                }
            });

            // Check the local storage to set the initial checkbox state
            const teacherId = checkbox.getAttribute('data-teacher-id');
            const isChecked = localStorage.getItem(`teacher_${teacherId}_inactive`) === 'true';
            checkbox.checked = isChecked;

            // Add or remove a class to make the row inactive/active based on local storage
            const row = checkbox.closest('.teacher-row');
            if (isChecked) {
                row.classList.add('inactive');
            }
        });
    </script>
    <script>
        $(document).ready(function () {
    $('#showActive').click(function () {
        $('.teacher-row').show();

        $('.inactive-checkbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).closest('.teacher-row').hide();
            }
        });
    });

});

$('#showInactive').click(function () {
        $('.teacher-row').hide();

        $('.inactive-checkbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).closest('.teacher-row').show();
            }
        });
});

    </script>

    <script src="teachers.js"></script>
    <script src="main.js"></script>

</body>

</html>
