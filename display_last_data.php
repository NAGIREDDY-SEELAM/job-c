<!DOCTYPE html>
<html>
<head>
    <title>Last Entered Data</title>
    <style>
        .person-container {
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: antiquewhite;
        }

        .person-container h2 {
            text-align: center;
        }

        .person-container p {
            margin-bottom: 10px;
        }

        .person-container .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Last Entered Person Information</h1>

    <?php
    // Assuming you've established a database connection, as mentioned earlier
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
    // Function to retrieve and display the last entered data
    function displayLastData() {
        global $conn;

        $sql = "SELECT * FROM applicants ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="person-container">
                <h2>Person Information</h2>
                <p><span class="label">Name:</span> ' . $row["fullname"] . '</p>
                <p><span class="label">Profession:</span> ' . $row["work"] . '</p>
                <p><span class="label">Location:</span> ' . $row["address"] . '</p>
                <p><span class="label">E-mail:</span> <a href="mailto:' . $row["email"] . '" style="color: blue; text-decoration: none;">' . $row["email"] . '</a></p>
                <p><span class="label">Phone:</span> <a href="tel:' . $row["phno"] . '" style="color: blue; text-decoration: none;">' . $row["phno"] . '</a> </p>
            </div>';
            }

            // Button to go back to the home page
            echo '<br><a href="index.html"><button>Go Back</button></a>';
       
        } else {
            echo "No data found.";
        }
    }

    displayLastData();
    
    ?>
</body>
</html>
