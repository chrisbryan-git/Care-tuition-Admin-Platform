
<script>
setTimeout(function(){
    window.location.href = "index";
}, 60000);
</script>

<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'Cares database';

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $admin_code = $_POST['admin_code'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    // Check if username already exists
    $check_query = "SELECT * FROM admin WHERE BINARY username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists! Please try a different one.');window.location='register.php';</script>";
        exit;
    }

    if ($password !== $cpassword) {
        echo "<script>alert('Passwords don't match! Please try again.');window.location='register.php';</script>";
        exit;
    }

    if ($admin_code !== '12345') {
        echo "<script>alert('Wrong admin Code! Please try again.');window.location='register.php';</script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $hashed_code = password_hash($admin_code, PASSWORD_BCRYPT);
    $insert_query = "INSERT INTO admin (username, admin_code, password, user_type) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssss", $username, $hashed_code, $hashed_password, $user_type);
    if ($stmt->execute()) {
        echo "<script>alert('Successfully registered!');window.location='index.php';</script>";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <!-- Add CSS and Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: new times roman;
        }

        .form-container {
            margin: 0 auto;
            max-width: 700px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            box-shadow:5px 5px 5px rgb(150 255 100);
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            <div class="form-group">
                <input type="text" name="name" required class="form-control" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <input type="password" name="admin_code" required class="form-control" placeholder="Enter admin code">
            </div>
            <div class="form-group">
                <input type="password" name="password" required class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <input type="password" name="cpassword" required class="form-control" placeholder="Confirm your password">
            </div>
            <div class="form-group">
                <select name="user_type" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Register Now" class="btn btn-primary">
            </div>
            <p>Already have an account? <a href="index.php">Login Now</a></p>
        </form>
    </div>
    <!-- Add Bootstrap JS if needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>