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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cares databae";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT teacherName, residence, date_employed, personalId, teacher_tsc, mobilePhone, email, subjectCombination, qualification, gender FROM teacher_table WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Teacher not found.";
        exit;
    }
} else {
    echo "Invalid teacher ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updating student information
    $newteacherName = $_POST['teacherName'];
    $newResidence = $_POST['residence'];
    $newDate = $_POST['date_employed'];
    $newPersonalId = $_POST['personalId'];
    $newTeacher_tsc = $_POST['teacher_tsc'];
    $newMobilePhone = $_POST['mobilePhone'];
    $newEmail = $_POST['email'];
    $newSubject = $_POST['subjectCombination'];
    $newQualification = $_POST['qualification'];
    $newGender = $_POST['gender'];

    $updateSql = "UPDATE teacher_table SET teacherName = '$newteacherName', residence = '$newResidence', date_employed = '$newDate', personalId = '$newPersonalId', teacher_tsc = '$newTeacher_tsc', mobilePhone = '$newMobilePhone', email = '$newEmail', subjectCombination = '$newSubject', qualification = '$newQualification', gender = '$newGender' WHERE id = '$id' ";

    if ($conn->query($updateSql) === TRUE) {
        echo "<script>";
echo "if (confirm('Update record?.')) {";
echo "window.location.href = 'teachers';";
echo "} else {";
echo "window.location.href = 'edit_teachers';";
echo "}";
echo "</script>";
exit;
    } else {
        
        echo "Error updating teacher information: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body{
        font-family:new times roman;
    }
    .form-control{
        padding:5px;
        float: left;

    }
    .form-label {
            display: block;
            padding:5px;
    }
    .container{
        display: block;
        padding:40px;
        box-shadow: 0.5px 0.5px 0.5px blue;
        

    }
    h1{
        text-align:center;
        padding:20px;
    }
</style>
    </style>
</head>

<body>
<div class="container">
    <h1>Edit Teacher</h1>
    <form method="post">
    <!-- <input type="text" name="id" value="<?php $row['id']; ?>"> -->
        
        <div class="row">
       <div class="col">
        <label class="form-label" for="Teacher name">Teacher Name</label>
         <input type="text" name="teacherName" class="form-control" value="<?= $row['teacherName']; ?>">
         </div>
         <div class="col">
         <label class="form-label" for="Residence">Residence</label>
        <input type="text" name="residence" class="form-control" value="<?= $row['residence']; ?>">
        </div>
         </div>
         <div class="row">
            <div class="col">
            <label class="form-label" for="Date Employed">Date Employed</label>
         <input type="date" class="form-control" name="date_employed" value="<?= $row['date_employed']; ?>">
         </div>
         <div class="col">
         <label class="form-label" for="Personal Id">Personal Id</label>
         <input type="text" class="form-control" name="personalId" value="<?= $row['personalId']; ?>">
        </div>
        </div>
      <div class="row">
        <div class="col">
        <label class="form-label" for="TSC No">TSC No.</label>
         <input type="text" class="form-control" name="teacher_tsc" value="<?= $row['teacher_tsc']; ?>">
        </div>
        <div class="col">
        <label class="form-label" for="Phone">Phone</label>
         <input type="text" class="form-control" name="mobilePhone" value="<?= $row['mobilePhone']; ?>">
        </div>
        </div>
        <div class="row">
            <div class="col">
        <label class="form-label" for="Email">Email</label>
        <input type="text" class="form-control" name="email" value="<?= $row['email']; ?>">
        </div>
        <div class="col">
        <label class="form-label" for="Subject Combination">Subject Combination</label>
        <input type="text" class="form-control" name="subjectCombination" value="<?= $row['subjectCombination']; ?>">
        </div>
        </div>
        <div class="row">
        <div class="col">
        <label class="form-label" for="Qualification">Qualification</label>
        <input type="text" class="form-control" name="qualification" value="<?= $row['qualification']; ?>">
        </div>
        <div class="col">
        <label class="form-label" for="Gender">Gender</label>
        <input type="text" class="form-control" name="gender" value="<?= $row['gender']; ?>">
        </div>
        <div class="col">
        <label class="form-label" for=""></label>
        <input type="submit" class="btn btn-primary" value="Save">
        </div>
        </div>
    </form>
    </div>
</body>
       
</html>
