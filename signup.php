<?php

// Print the form data submitted via POST
var_dump($_POST); // or print_r($_POST);

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection status using both methods
if ($conn->connect_error) {
    // Output error message and halt script execution
    die("Connection failed: " . $conn->connect_error);
}

// If the script reaches this point, the connection was successful
echo "Connected successfully!";

// Sign-up Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Validate form data
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]); // Trim the password
    $confirm_password = trim($_POST["confirm_password"]);

    if (empty($username) || empty($email) || empty($password)) {
        echo "Error: Please fill out all required fields.";
        exit; // Stop script execution
    }

    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
        exit; // Stop script execution
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    echo "SQL Query: " . $sql . "<br>";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
         // Redirect to sign-in page
         header("Location: signin.html");
         exit;
    } else {
        // Output detailed error message
        echo "Error: " . $conn->error;
    }

    // Add debug statements
    echo "Debug: Reached end of script.<br>";
    exit;
}



$conn->close();
?>
