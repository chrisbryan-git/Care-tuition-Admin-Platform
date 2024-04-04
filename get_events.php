<?php
        
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>Event Name: " . $row["event_name"] . "</p>";
                echo "<p>Date: " . $row["event_date"] . "</p>";
                
                echo "<hr>"; 
            }
        } else {
            echo "No events available.";
        }

        // Close connection
        $conn->close();
        ?>