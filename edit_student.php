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
$dbname = "Cares database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT student_name, id, class, type_of_program, subjects_to_be_taught,date_of_admission,parent_name,phone_number,parent_email,location_address FROM students_table WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit;
    }
} else {
    echo "Invalid student ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for updating student information
    $newStudentName =ucwords( $_POST['student_name']);
    $newClass = $_POST['class'];
    $newProgram = $_POST['type_of_program'];
    $newSubjects =ucwords($_POST['subjects_to_be_taught']);

    $newDate = $_POST['date_of_admission'];
    $newParent = ucwords($_POST['parent_name']);
    $newPhone = $_POST['phone_number'];
    $newEmail = $_POST['parent_email'];
    $newLocation = ucwords( $_POST['location_address']);

    $updateSql = "UPDATE students_table SET student_name = '$newStudentName', class = '$newClass', type_of_program = '$newProgram', subjects_to_be_taught = '$newSubjects',
    date_of_admission='$newDate',parent_name='$newParent',phone_number='$newPhone',parent_email='$newEmail',location_address='$newLocation' WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo '<script>
    alert("Updated successfully!");
    setTimeout(function(){
        window.location.href = "students";
    }, 0);
</script>';
    } else {
        echo "Error updating student information: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for the form */
        body {
            background-color: #f4f4f4;
            font-family: "Times New Roman", Times, serif;
        }

        .container {
            max-width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
        }

        label {
            font-weight: bold;
        }

        
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
        }
        .form-group {
        margin-bottom: 10px;
        margin:10px;
    }

    .form-control,label {
        margin-left:10px;
        width:300px;
    }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Student Information</h2>
    <form method="POST">
        <div class="row">
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" class="form-control" name="student_name" value="<?php echo $row['student_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" class="form-control" name="class" value="<?php echo $row['class']; ?>" >
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="type_of_program">Type of Program:</label>
                <input type="text" class="form-control" name="type_of_program" value="<?php echo $row['type_of_program']; ?>" required>
            </div>
            <div class="form-group">
                <label for="subjects_to_be_taught">Subjects to be Taught:</label>
                <input type="text" class="form-control" name="subjects_to_be_taught" value="<?php echo $row['subjects_to_be_taught']; ?>"required>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="date_of_admisssion">Date Of Admission</label>
                <input type="date" class="form-control" name="date_of_admission" value="<?php echo $row['date_of_admission']; ?>" required>
            </div>
            <div class="form-group">
                <label for="parent_name">Parent Name:</label>
                <input type="text" class="form-control" name="parent_name" value="<?php echo $row['parent_name']; ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="phone Number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone_number']; ?>" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="parent_email" value="<?php echo $row['parent_email']; ?>" >
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" class="form-control" name="location_address" value="<?php echo $row['location_address']; ?>" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
</html>
