<?php
session_start();

if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo '<script>alert("' . $_SESSION['success'] . '");</script>';
    unset($_SESSION['success']);
    header('Location: home.php');
    exit;
}

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'Cares database';

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username, );
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit;
        } else {
            $error = '<span style="color: red;">Login failed. Please check your username and password.</span>';
        }
    } else {
        $error = '<span style="color: red;">Login failed. Please check your username and password.</span>';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family:new times roman;
    }
    .login-form {
      max-width: 700px;
      width: 100%;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-align: center; /* Center the form */
      box-shadow:5px 5px 5px rgb(150 255 100);
    }
    .logo {
      margin-bottom: 20px;
    }
    img {
        width:160px;
        border-radius:20px;
    }
  </style>
</head>
<body>
  <div class="login-form">
    <div class="logo">
      <img src="logo.jpg" alt="Logo" />
    </div>
    <!-- <h2>Login</h2> -->
    <form method="POST" action="">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <?php if(isset($error)) { ?>
      <p><?php echo $error; ?></p>
    <?php } ?>
    <p>No account? <a href="register.php">Register now</a></p>
    <a href="#">Forgot password?</a>
  </div>
</body>
</html>