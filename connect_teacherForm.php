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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $teacherName = ucwords($_POST['teacherName']);
    $teacher_tsc = $_POST["teacher_tsc"];
    $personalId = $_POST["personalId"];

    
    $duplicateSql = "SELECT * FROM teacher_table WHERE personalId = '$personalId' OR teacher_tsc='$teacher_tsc' LIMIT 1";
    $result = $conn->query($duplicateSql);

    if ($result && $result->num_rows > 0) {
        echo "<script>alert('This entry already exists.'); window.history.back();</script>";
        exit();
    }
    
    $teacherName =ucwords($_POST["teacherName"]);
    $residence = ucwords($_POST["residence"]);
    $date_employed = $_POST["date_employed"];
    $personalId = $_POST["personalId"];
    $teacher_tsc = $_POST["teacher_tsc"];
    $mobilePhone = $_POST["mobilePhone"];
    $email = $_POST["email"];
    $subjectCombination = ucwords($_POST["subjectCombination"]);
    $qualification = ucwords($_POST["qualification"]);
    $gender = ucwords($_POST["gender"]); 

   
    $sql = "INSERT INTO teacher_table (teacherName, residence, date_employed, personalId, teacher_tsc, mobilePhone, email, subjectCombination, qualification,gender)
            VALUES ('$teacherName', '$residence','$date_employed', '$personalId', '$teacher_tsc', '$mobilePhone', '$email', '$subjectCombination', '$qualification','$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully registered." . htmlspecialchars(ucwords($teacherName)) . "'); window.location.href='teacher_form';</script>";
    } else {
        echo "<script>alert('Error entering the data. Try again!'); window.history.back();</script>";
    }

    $conn->close();
}
