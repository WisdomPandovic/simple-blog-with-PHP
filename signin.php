<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database credentials
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "mydatabase";

    // Attempt to connect to the database
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query with prepared statement
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row["password"])) {
            // Authentication successful, set session variables and redirect
            $_SESSION["username"] = $username;
            // Regenerate session ID for security
            session_regenerate_id(true);
            header("Location: index.php");
            exit;
        } else {
            // Invalid password, redirect back to sign-in page with error message
            header("Location: signin.php?error=1");
            exit;
        }
    } else {
        // User not found, redirect back to sign-in page with error message
        header("Location: signin.php?error=1");
        exit;
    }

    $conn->close();
}
?>
