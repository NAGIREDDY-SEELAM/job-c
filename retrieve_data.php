<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php

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


// Function to retrieve and display data
function displayData() {
    global $conn;

    $sql = "SELECT * FROM applicants";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     echo "<table border='1'>
    //         <tr>
    //             <th>ID</th>
    //             <th>Full Name</th>
    //             <th>Phone Number</th>
    //             <th>Email</th>
    //             <th>Address</th>
    //             <th>Profession</th>
    //         </tr>";
            

    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr>
    //             <td>" . $row["id"] . "</td>
    //             <td>" . $row["fullname"] . "</td>
    //             <td>" . $row["phno"] . "</td>
    //             <td>" . $row["email"] . "</td>
    //             <td>" . $row["address"] . "</td>
    //             <td>" . $row["work"] . "</td>
    //         </tr>";
    //     }

    //     echo "</table>";


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
        echo '<br><a href="index.html"><button>Go Back To Home Page</button></a>';

    } else {
        echo "No data found.";
    }
}

if (isset($_POST["show_data"])) {
    displayData();
}



?>

<!-- HTML form to display the data -->
<form action="" method="POST">
    <input  type="submit" name="show_data" value="Show Data" >
</form>

    
</body>
</html>