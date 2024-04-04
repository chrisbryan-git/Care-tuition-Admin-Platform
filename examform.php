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
  <title>exam-entry</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body{
        font-family:'Times new roman';
    }
    form {
        /* background-color: WhiteSmoke; */
        padding: 20px;
        box-shadow: 0 0 15px blue;
        border-radius: 10px;
        height: 700px;
        width: 1250px;
        overflow-y: scroll;
        overflow-x: scroll;
    }
    .btn-primary {
        background-color: #007bff; 
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <form method="post" action="connect_exam_form" class="mt-5">
      <h2>Enter Student scores</h2>
      <div class="row">
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Cares database";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //  Fetch student names from the database
        $sql = "SELECT id, student_name FROM students_table"; 
        $result = $conn->query($sql);
        ?>
        <div class="col-md-6">
          <label for="studentName">Student Name:</label>
          <input type="hidden" id="studentId" name="studentId" value="" />
          <select id="studentName" name="studentName" class="form-control" required>
            <option value="" disabled selected>Choose a student</option>
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              
                echo '<option value="' . $row['student_name'] . '" data-student-id="' . $row['id'] . '">' . $row['student_name'] . '</option>';
              }
            }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="yearOfStudy">Year of Study/Form:</label>
          <!-- <input type="text" id="yearOfStudy" name="yearOfStudy" class="form-control" required> -->
          <select id="yearOfStudy" class="form-control" name="yearOfStudy">
                        <option selected>Select class</option>
                        <option value="Day care">Day care</option>
                        <option value="Yr/Grd 1">Yr/Grd 1</option>
                        <option value="Yr/Grd 2">Yr/Grd 2</option>
                         <option value="Yr/Grd 3">Yr/Grd 3</option>
                        <option value="Yr/Grd 4">Yr/Grd 4</option>                        
                        <option value="Yr/Grd 5">Yr/Grd 5</option>
                        <option value="Yr/Grd 6">Yr/Grd 6</option>                        
                        <option value="Yr/Grd 7">Yr/Grd 7</option>
                        <option value="Yr/Grd 8">Yr/Grd 8</option>                        
                        <option value="Yr/Grd 9">Yr/Grd 9</option>
                        <option value="Yr/Grd 10">Yr/Grd 10</option>
                        <option value="Yr/Grd 11">Yr/Grd 11</option>
                        <option value="Yr/Grd 12">Yr/Grd 12</option>
                         <option value="Form 1">Form 1</option>
                        <option value="Form 2">Form 2</option>                        
                        <option value="Form 3">Form 3</option>
                        <option value="Form 4">Form 4</option>                        
                        <option value="Diploma">Diploma</option>
                        <option value="Other">Other</option>        
                        
                    </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" class="form-control" required>
          <script>
            const dateInput = document.getElementById('date');
            const currentDate = new Date().toISOString().split('T')[0];
            dateInput.value = currentDate;
          </script>
        </div>
        <div class="col-md-6">
          <label for="examType">Exam Type:</label>
          <select id="examType" name="examType" class="form-control" required>
            <option value="">Select Exam Type</option>
            <option value="Opener Exam">Opener Exam</option>
            <option value="CAT 1 Exam">CAT 1 Exam</option>
            <option value="CAT 2 Exam">CAT 2 Exam</option>
            <option value="CAT 3 Exam">CAT 3 Exam</option>
            <option value="Term 1 Exam">Term 1 Exam</option>
            <option value="Term 2 Exam">Term 2 Exam</option>
            <option value="Term 3 Exam">Term 3 Exam</option>
            <option value="Mock Exam">Mock Exam</option>
            <option value="Admission Exam">Admission Exam</option>
            <option value="Internal Exams">Internal Exams</option>
          </select>
        </div>
      </div>
      <h4>Subject Scores</h4>
      <div class="row">
        <div class="col-md-4">
          <label for="maths">Mathematics:</label>
          <input type="number" id="maths" name="maths" class="form-control" min="0" max="100">
          <label for="maths_na">N/A <input type="checkbox" id="maths_na" name="maths_na"></label>
        </div>
        <div class="col-md-4">
          <label for="english">English:</label>
          <input type="number" id="english" name="english" class="form-control" min="0" max="100" maxlength="2">
         
          <label for="english_na">N/A <input type="checkbox" id="english_na" name="english_na"></label>
        </div>
        <div class="col-md-4">
          <label for="biology">Biology:</label>
          <input type="number" id="biology" name="biology" class="form-control" min="0" max="100">
          <label for="biology_na">N/A <input type="checkbox" id="biology_na" name="biology_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="physics">Physics:</label>
          <input type="number" id="physics" name="physics" class="form-control" min="0" max="100">
          <label for="physics_na">N/A <input type="checkbox" id="physics_na" name="physics_na"></label>
        </div>
        <div class="col-md-4">
          <label for="chemistry">Chemistry:</label>
          <input type="number" id="chemistry" name="chemistry" class="form-control" min="0" max="100">
          <label for="chemistry_na">N/A <input type="checkbox" id="chemistry_na" name="chemistry_na"></label>
        </div>
        <div class="col-md-4">
          <label for="science">Science:</label>
          <input type="number" id="science" name="science" class="form-control" min="0" max="100">
          <label for="science_na">N/A <input type="checkbox" id="science_na" name="science_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="geography">Geography:</label>
          <input type="number" id="geography" name="geography" class="form-control" min="0" max="100">
          <label for="geography_na">N/A <input type="checkbox" id="geography_na" name="geography_na"></label>
        </div>
        <div class="col-md-4">
          <label for="history">History:</label>
          <input type="number" id="history" name="history" class="form-control" min="0" max="100">
          <label for="history_na">N/A <input type="checkbox" id="history_na" name="history_na"></label>
        </div>
        <div class="col-md-4">
          <label for="ict">ICT/Computer Science:</label>
          <input type="number" id="ict" name="ict" class="form-control" min="0" max="100">
          <label for="ict_na">N/A <input type="checkbox" id="ict_na" name="ict_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="accounting">B.Studies/Accounting:</label>
          <input type="number" id="accounting" name="accounting" class="form-control" min="0" max="100">
          <label for="accounting_na">N/A <input type="checkbox" id="accounting_na" name="accounting_na"></label>
        </div>
        <div class="col-md-4">
          <label for="religion">Religion:</label>
          <input type="number" id="religion" name="religion" class="form-control" min="0" max="100">
          <label for="religion_na">N/A <input type="checkbox" id="religion_na" name="religion_na"></label>
        </div>
        <div class="col-md-4">
          <label for="homescience">Home Science:</label>
          <input type="number" id="homescience" name="homescience" class="form-control" min="0" max="100">
          <label for="homescience_na">N/A <input type="checkbox" id="homescience_na" name="homescience_na"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="programming">Programming:</label>
          <input type="number" id="programming" name="programming" class="form-control" min="0" max="100">
          <label for="programming_na">N/A <input type="checkbox" id="programming_na" name="programming_na"></label>
        </div>
        <div class="col-md-4">
          <label for="swahili">Swahili:</label>
          <input type="number" id="swahili" name="swahili" class="form-control" min="0" max="100">
          <label for="swahili_na">N/A <input type="checkbox" id="swahili_na" name="swahili_na"></label>
        </div>
        <div class="col-md-4">
          <label for="indig">Indigenous/Foreign Lang.:</label>
          <input type="number" id="indig" name="indig" class="form-control" min="0" max="100">
          <label for="indig_na">N/A <input type="checkbox" id="indig_na" name="indig_na"></label>
        </div>
      </div>
      <div class="row">
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
      <a href="exams" class="btn btn-primary">Back</a>
        </div>
      
    </form>
  </div>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>