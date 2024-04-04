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
    $sql = "SELECT teacherName, residence, class, type_of_program, subjects_to_be_taught FROM students_table WHERE id = $id";
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
    $newStudentName = $_POST['student_name'];
    $newClass = $_POST['class'];
    $newProgram = $_POST['type_of_program'];
    $newSubjects = $_POST['subjects_to_be_taught'];

    $updateSql = "UPDATE students_table SET student_name = '$newStudentName', class = '$newClass', type_of_program = '$newProgram', subjects_to_be_taught = '$newSubjects' WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo "Student information updated successfully.";
        header("Location: students");
        exit;
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #3498db;
            color: #fff;
            margin: 0;
        }

        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Edit Student Information</h1>
    <form method="POST">
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" value="<?php echo $row['student_name']; ?>" required><br>

        <label for="class">Class:</label>
        <input type="text" name="class" value="<?php echo $row['class']; ?>" required><br>

        <label for="type_of_program">Type of Program:</label>
        <input type="text" name="type_of_program" value="<?php echo $row['type_of_program']; ?>" required><br>

        <label for="subjects_to_be_taught">Subjects to be Taught:</label>
        <input type="text" name="subjects_to_be_taught" value="<?php echo $row['subjects_to_be_taught']; ?>" required><br>

        <button type="submit">Save Changes</button>
        
    </form>

    
</html>
