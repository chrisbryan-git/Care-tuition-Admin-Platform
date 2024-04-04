<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "omulodi54";
$dbname = "school";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the personal ID from the query string
$personalId = $_GET['personalId'];

// Search in teacher_table
$teacherQuery = "SELECT * FROM teacher_table WHERE personalId = '$personalId'";
$teacherResult = $conn->query($teacherQuery);

// Search in student_table
$studentQuery = "SELECT * FROM teacher_student_schedule WHERE personalId = '$personalId'";
$studentResult = $conn->query($studentQuery);

// Display the search results
if ($teacherResult->num_rows > 0) {
  echo "<h2>Teacher Results:</h2>";
  while ($row = $teacherResult->fetch_assoc()) {
    echo "<p>Name: " . $row["teacherName"] . "</p>";
    echo "<p>Location: " . $row["residence"] . "</p>";
    // Display other relevant information
  }
}

if ($studentResult->num_rows > 0) {
  echo "<h2>Student Results:</h2>";
  while ($row = $studentResult->fetch_assoc()) {
    echo "<p>Name: " . $row["teacherName"] . "</p>";
    echo "<p>Subject: " . $row["subject"] . "</p>";
    // Display other relevant information
  }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Add custom CSS styles here */
  </style>
</head>
<body>
  <div class="container">
    <h1>Search</h1>
    <div class="form-group">
      <label for="personalId">Personal ID:</label>
      <input type="text" class="form-control" id="personalId" placeholder="Enter Personal ID">
    </div>
    <button type="button" class="btn btn-primary" onclick="search()">Search</button>
    <div id="search-results"></div>
  </div>
  <script>
    function search() {
      var personalId = document.getElementById("personalId").value;
      // Perform the search using personalId in both teacher_table and student_table
      // Display the results accordingly
      fetch('search.php?personalId=' + personalId)
        .then(response => response.text())
        .then(data => {
          document.getElementById("search-results").innerHTML = data;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  </script>
</body>
</html>