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
    <title>School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
        form {
            margin: 30px 0px 30px 30px;
            padding: 10px;
            width: 90%;
        
            border-radius: 10px;
            background: var(--secondary);
        }
        body{
            font-family:new times roman;
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
        #report-side-bar{
            margin-top:10px !important;
            margin-left:10px;            
            margin-bottom:30px !important;
        }
    </style>
    
</head>

<body>

    <!-- Sidebar -->
    <section id="report-side-bar">
        <div class="sidebar">
            <nav>
                <a href="home.php" class="sidebar-brand">
                <img src="logo.jpg" alt="" srcset="" style="width:150px; border-radius:20px;">
                </a>
                <div class="sidebar-menu">
                <li><i class="fa-solid fa-gauge sidebarBtn" ></i><a href="home">Dashboard</a></li>
            <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="students">Students</a></li>
            <li><i class="fas fa-chalkboard-teacher"></i><a href="teachers">Teacher</a></li>
            <!-- <LI><i class="fa-solid fa-clipboard-user"></i><a href="student2#showActive">Stud</a></LI> -->
            <LI><i class="fa-solid fa-clipboard-user"></i><a href="exams">Exams</a></LI>
            <li><i class="fa-solid fa-school"></i><a href="attendance">Attendance</a></li>
            <!-- <li><i class="fa-solid fa-money-check-dollar"></i><a href="Fees">Fees/Invoices</a></li> -->
            <li><i class="fa-solid fa-book"></i><a href="timetable">Timetable</a></li>
            <!-- <li><i class="fa-regular fa-user"></i><a href="users">Users</a></li> -->
            <li><i class="fa-solid fa-calendar-days"></i><a href="sessions">Sessions</a></li>
            <!-- <li><i class="fa fa-flag" aria-hidden="true"></i><a href="reports">Reports</a></li> -->
            <li><i class="fa fa-sign-out"></i><a href="logout">Log out</a></li>
        </nav>
            </nav>
        </div>
    </section>

    <?php
$host = "localhost";
$user = "root";
$password = "omulodi54";
$database = "school";


$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


function sanitizeInput($input) {
    global $mysqli;
    return $mysqli->real_escape_string($input);
}


$sql = "SELECT id, title, description, file_path FROM form_data";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>graphical_analysis</title>
    <style>
.board {
    background-color: WhiteSmoke;
    box-shadow: 0px 0px 10px blue;
    padding: 20px; 
}


.table-container {
    overflow-x: auto; /* Enable horizontal scrolling if table overflows */
}

/* Styles for the table itself */
.table {
    width: 100%;
    border-collapse: collapse;
    
    margin-top: 10px; 
}


.table th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 10px;
}


.table td {
    padding: 10px;
    
}


.table td:last-child {
    text-align: center;
}


.table td:last-child a {
    text-decoration: none;
    color: blue;
}


.table td:last-child a:hover {
    text-decoration: underline;
}
.button {
    display: inline-block;
    padding: 8px 16px;
    background-color: darkgrey;
    color: WhiteSmoke;
    border: none;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #0056b3; 
}

    </style>
</head>
<body>
    <dir class="board" style="background-color: WhiteSmoke; box-shadow: 0px 0px 10px blue;">
    <div class="container mt-4">
        <h1>Graphical Analysis Of Exams</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = "omulodi54"; 
    $dbname = "school"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM exam_scores"; 
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "No data found";
    }

    $labels = array();
    $values = array();
    
    

    foreach ($data as $row) {
        $labels[] = $row['student_name'];
         $values[] = $row['average_score'];
         
        
    }

    $labels_json = json_encode($labels);
    $values_json = json_encode($values);
       

    
    $conn->close();
    ?>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <div id="myChart"></div>

    <script>
        var labels = <?php echo $labels_json; ?>;
        var values = <?php echo $values_json; ?>;
        

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: labels,
                datasets: [{
                    label: 'Percentage Score',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                
            }
        });
    </script>
    </dir>

    <!-- <div><a href="exams" class=" btn btn-primary">Return</a> </div> -->
</body>
</html>

<?php

$mysqli->close();
?>

    </section>

    <script src="main.js"></script>

</body>

</html>