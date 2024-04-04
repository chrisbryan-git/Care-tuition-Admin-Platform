<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "omulodi54";
$dbname = "school";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the search input is set
if (isset($_POST['search-input'])) {
    // Retrieve the input value from the form
    $searchInput = mysqli_real_escape_string($conn, $_POST['search-input']);

    // Prepare and execute the SQL query to fetch records
    $sql = "SELECT * FROM teacher_table WHERE personalId = '$searchInput'
            UNION
            SELECT * FROM teacher_student_schedule WHERE personalId = '$searchInput'";
    $result = mysqli_query($conn, $sql);

    // Check if any records match the search input
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Display the retrieved data as per your requirement
            echo "Teacher Name: " . $row['teacherName'] . "<br>";
            echo "Student: " . $row['studentName'] . "<br>";
            echo "Residence: " . $row['residence'] . "<br>";
        }
    } else {
        echo "No matching records found.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search Field</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body, html {
      height: 100%;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .search-input {
      position: relative;
      display: inline-block;
      width: 300px;
    }
    .search-input input {
      width: 100%;
      padding: 10px 40px 10px 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }
    .search-input input:focus {
      outline: none;
    }
    .search-input .search-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: green;
      cursor: pointer;
    }
    .search-input .search-icon:hover {
      color: #333;
    }
    .search-input .search-icon::before {
      content: "\f002";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
    }
    .search-input .cursor-animation {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      width: 2px;
      height: 20px;
      background-color: #333;
      animation: cursor-blink 0.9s infinite;
    }
    @keyframes cursor-blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }
    form{
        justify-content:center;
        margin-top: 20%;
    }
  </style>
</head>
<body>
<form method="POST">  
    <div class="container">  
      <div class="search-input">  
        <input type="text" name="search-input" placeholder="Enter your ID...">  
        <span class="search-icon"></span>  
        <span class="cursor-animation"></span>  
      </div>  
      <button type="submit" class="submit-btn btn btn-primary">Enter</button>  
    </div>  
  </form>  
</body>
</html>