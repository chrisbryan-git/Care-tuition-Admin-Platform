<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <style>
        
        form {
            margin: 30px 0px 30px 30px;
            padding: 10px;
            width: 90%;
            overflow: auto;
            border-radius: 10px;
            background: var(--secondary);
        }


        
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        
        input[type="text"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        
        textarea {
            resize: vertical;
        }

        
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        #attendance-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:15px !important;
        }
        body{
            font-family:new times roman;
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
                <li><i class="fa-solid fa-gauge sidebarBtn" ></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="students.php">Students</a></li>
            <li><i class="fas fa-chalkboard-teacher"></i><a href="Teachers.php">Teacher</a></li>
            <!-- <LI><i class="fa-solid fa-clipboard-user"></i><a href="student2.php#showActive">Stud</a></LI> -->
            <LI><i class="fa-solid fa-clipboard-user"></i><a href="exams.php">Exams</a></LI>
            <li><i class="fa-solid fa-school"></i><a href="Attendance.php">Attendance</a></li>
            <li><i class="fa-solid fa-money-check-dollar"></i><a href="Fees.php">Fees/Invoices</a></li>
            <li><i class="fa-solid fa-book"></i><a href="timetable.php">Timetable</a></li>
            <!-- <li><i class="fa-regular fa-user"></i><a href="users.php">Users</a></li> -->
            <li><i class="fa-solid fa-calendar-days"></i><a href="Sessions.php">Sessions</a></li>
            <!-- <li><i class="fa fa-flag" aria-hidden="true"></i><a href="reports.php">Reports</a></li> -->
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

        <h3 id="header">
            Fees/Invoices
        </h3>


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Paid</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="get_paidfees.php" class="btn btn-primary">Click me</a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pending</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="get_unpaidfees.php" class="btn btn-primary">Click me</a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Balances</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="get_balances.php" class="btn btn-primary">Click me</a>
                </div>
            </div>
        </div>
        </div>

        <h4 id=header>
            Fees Structure Request
        </h4>

        <form action="#" method="post">

            <div class="row">
                <label for="course_name">Course Name</label>
                <input type="text" id="course_name" name="course_name" required>

                <label for="Student Id">Student ID</label>
                <input type="text" id="Studentid" name="Studentid" required>

            </div>
            <div class="row">
                <label for="class">class/year</label>
                <input type="text" id="class/year" name="clsss" required>

                <label for="message">Additional Information</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <button type="submit">Submit Request</button>
        </form>
        </div>
       
    </section>

    <script src="main.js"></script>

</body>

</html>