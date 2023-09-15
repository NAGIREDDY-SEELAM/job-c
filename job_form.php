<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job-form</title>
</head>
<body>
<?php
// Database connection configuration
$servername = "127.0.0.1";
$username = "root";
$password = "xampp@1.";
$dbname = "job_application_db";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $phno = $_POST["phno"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $work = $_POST["work"];

    // Insert data into the database table
    $sql = "INSERT INTO applicants (fullname, phno, email, address, work) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fullname, $phno, $email, $address, $work);

    if ($stmt->execute()) {
        echo "Data inserted successfully";
        
        
       echo' <div class="history"  >
       <br> <a  href="retrieve_data.php"  style="text-align: center;color: whitesmoke;background-color: #45a049;padding: 10px;border-radius: 5px; text-decoration: none;">show data</a><br><br>
     </div><br><br>';
       

        
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>



    
</body>
</html>