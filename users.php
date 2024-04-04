<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- Sidebar -->
    <section>
        <div class="sidebar">
            <nav>
                <a href="index.html" class="sidebar-brand">
                    <h3><i class="fa fa-user-edit me-2"></i>School</h3>
                </a>
                <div class="sidebar-menu">
            <li><i class="fa-solid fa-gauge sidebarBtn" ></i><a href="index.php">Dashboard</a></li>
            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="students.php">Students</a></li>
            <li><i class="fas fa-chalkboard-teacher"></i><a href="Teachers.php">Teacher</a></li>
            <LI><i class="fa-solid fa-clipboard-user"></i><a href="Staff.php">Staff</a></LI>
            <li><i class="fa-solid fa-school"></i><a href="Attendance.php">Attendance</a></li>
            <li><i class="fa-solid fa-money-check-dollar"></i><a href="Fees.php">Fees/Invoices</a></li>
            <li><i class="fa-solid fa-book"></i><a href="subjects.php">Subjects</a></li>
            <li><i class="fa-regular fa-user"></i><a href="users.php">Users</a></li>
            <li><i class="fa-solid fa-calendar-days"></i><a href="Sessions.php">Sessions</a></li>
            <li><i class="fa fa-flag" aria-hidden="true"></i><a href="reports.php">Reports</a></li>
            <li><i class="fa fa-sign-out"></i><a href="login.php">Log out</a></li>
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
            All users
        </h3>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All user</h4>
                    <img src="images\noun-expense-5864569.png" alt="img">
                    <a href="" class="btn btn-primary" onclick=" ">Click here</a>
                </div>
            </div>
        
        
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Active users</h4>
                    <img src="images\icons8-invoice-64.png" alt="img">
                    <a href="#" class="btn btn-primary" onclick=" ">Click here</a>
                </div>
            </div>
        
        
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Logged out users</h4>
                    <img src="images\icons8-bill-64.png" alt="img">
                    <a href="#" class="btn btn-primary" onclick=" ">Click here</a>
                </div>
            </div>
        </div>
        </div>
        

        <dir class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
            <table width="100%">
                <h4>active users</h4>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Teacher Id</td>
                        <td>Roles</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="Teachers">
                            <img src="images\21104.png" alt="images\21104.png">
                            <div class="people">
                                <h5>Mr Nganga</h5>
                                <p>Nganga@gmail.com</p>
                            </div>
                        </td>
                        <td class="id">
                            <h5>ED 03</h5>
                        </td>
                        <td class="role">
                            <h5>Head of department</h5>
                        </td>
                        <td class="active">
                            <span>active</span>
                        </td>
                    </tr>
    </section>

    <script src="main.js"></script>

</body>

</html>