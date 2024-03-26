<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>IMS</title> 
    <link rel="stylesheet" href="/static/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    



<?php
            // MySQL connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "insu";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to retrieve login details from the 'registered' table
            $sql = "SELECT id, username, email FROM registered";
            $result = $conn->query($sql);

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td></tr>";

                }
            } else {
                echo "<tr><td colspan='2'>0 results</td></tr>";
            }

            // Close connection
            $conn->close();
?>
</body>
</html>
