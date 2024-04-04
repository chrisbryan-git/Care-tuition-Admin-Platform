<?php
                
                $servername = "your_servername";
                $username = "your_username";
                $password = "your_password";
                $dbname = "your_database";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                $sql = "SELECT * FROM fees WHERE status = 'Paid'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>Fee ID: " . $row["id"] . "<br>Amount: $" . $row["amount"] . "</p>";
                    }
                } else {
                    echo "No paid fees found.";
                }

                $conn->close();
                ?>