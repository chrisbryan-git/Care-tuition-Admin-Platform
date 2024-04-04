<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Output JavaScript prompt to confirm logout
    echo "<script>
        if (confirm('Are you sure you want to log out?')) {
            // Redirect to the login page
            window.location.href = 'index';
        } else {
            // Redirect back to the current page
            window.location.href = 'home';
        }
    </script>";
    
    // Destroy the session here after redirection
    session_destroy();
}
?>






