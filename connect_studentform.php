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
$studentname =ucwords($_POST['studentname']) ?? '';
$subjects = ucwords($_POST['subjects']) ?? '';
$date_adm = $_POST['date_adm'] ?? '';
$typeofprogram = isset($_POST['typeofprogram']) ? $_POST['typeofprogram'] : [];
$class = isset($_POST['class']) ? $_POST['class'] : [];
$parentName = ucwords($_POST['parentName'])?? '';
$phonenumber = $_POST['phonenumber'] ?? '';
$parentemail = $_POST['parentemail'] ?? '';
$locationaddress =ucwords($_POST['locationaddress']) ?? '';

$message = ($studentname !== '' && $date_adm !== '' && $locationaddress !== '' && $subjects !== '' && $phonenumber !== '' && $typeofprogram !== '')
    ? ['success' => true, 'text' => 'Registration successful!']
    : ['success' => false, 'text' => 'Please fill in all the fields!'];

$conn = mysqli_connect('localhost', 'root', "", "Cares database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO students_table (student_name, subjects_to_be_taught, date_of_admission, type_of_program, class, parent_name, phone_number, parent_email, location_address)
        SELECT '$studentname', '$subjects', '$date_adm', '$typeofprogram', '$class', '$parentName', '$phonenumber', '$parentemail', '$locationaddress'
        FROM DUAL
        WHERE NOT EXISTS (
            SELECT student_name 
            FROM students_table 
            WHERE student_name = '$studentname' AND subjects_to_be_taught = '$subjects' AND date_of_admission = '$date_adm' AND type_of_program = '$typeofprogram' AND class = '$class' AND parent_email = '$parentemail'
        )";

if (mysqli_query($conn, $sql)) {
    // Check if any rows were affected
    if (mysqli_affected_rows($conn) > 0) {
        echo '<script>alert("Registration done successfully. Welcome to Cares!");</script>';
    } else {
        echo '<script>alert("Click OK to prevent duplicate entry!");</script>';
    }
} else {
    echo '<script>alert("Error: ' . $sql . '\n' . mysqli_error($conn) . '");</script>';
}

// Close the database connection
mysqli_close($conn);

// echo '<script>window.location = "../Students_Form";</script>';
 echo '<script>window.location = "students_form";</script>';
?>
