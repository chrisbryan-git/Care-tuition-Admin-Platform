<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header("Location: user_login.php");
    exit;
}
$_SESSION['last_activity'] = time();

?>
<script>

setTimeout(function(){
    window.location.href = "user_login.php";
}, 60000); // 60,000 milliseconds = 1 minute
</script>

<!DOCTYPE html>
<html>
<head>
    <title>Search Timetable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
  #div1 {
    display: flex;
    align-items: center;
  }

  h1, h2 {
    margin: 0;
  }
  
  h1 {
    flex: 1;
  }
  .form-control{
    width:650%;
    padding:20px;
    
  }
  .flex-container {
  display: flex;
  justify-content: space-between;
  padding:40px;
}

.flex-container > div {
  margin-right: 400px; /* Adjust this value to set the desired spacing */
}
body {
         font-family: "Times New Roman", Times, serif;
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
          width: 150%;
        }
      
        .table thead {
          position: sticky;
          top: 0;
          background-color: #f7f7f7;
          z-index: 1;
          box-shadow: 1px 1px 1px pink;
          padding:50px;
        }
</style>

</head>
<body>
    <?php
    // Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "omulodi54"; // Replace with your own password
    $dbname = "cares";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the records based on the search query
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM timetable WHERE day LIKE '%$search%' OR teacher_name LIKE '%$search%' OR student_name LIKE '%$search%' OR student_level LIKE '%$search%'";
         $result = $conn->query($sql);
    } else {
        // If no search query is provided, retrieve all records
        $sql = "SELECT * FROM timetable";
        $result = $conn->query($sql);
    }
    ?>

    <div class="container">
    <!-- <div id="div1">

</div> -->
        
        <form method="get" action="">
            <div class="form-group flex-container">
              <div>
                <input class="form-control" type="text" name="search" placeholder="Search Here">
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Search</button>
              </div>  
              <div>
                <a href="alltimetable.php" class="btn btn-primary" style="border-radius: 5px;">Back</a>
              </div>
                           
            </div>
                                              
        </form>
        <div class="table-container">
         <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>Teacher's Name</th>
                    <th>Student's Name</th>
                    <th>Student Level</th>
                    <th>Day</th>
                    <th>Time IN</th>
                    <th>Time OUT</th>
                    <th>Teacher's Phone</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><b style='text-transform:uppercase'>" . $row['teacher_name'] . "</b></td>";
                    // echo "<td>" . $row['teacher_name'] . "</td>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['student_level'] . "</td>";
                    echo "<td><b style='text-transform:uppercase'>" . $row['day'] . "</b></td>";
                    echo "<td>" . $row['time_in'] . "</td>";
                    echo "<td>" . $row['time_out'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='6'>No records found.</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
    <?php
    // Close the database connection
    $conn->close();
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
