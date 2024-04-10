<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is authenticated
    if (!isset($_SESSION["username"])) {
        echo "User is not authenticated. Please sign in.";
        exit;
    }

    // Check if required fields are set and not empty
    if (empty($_POST["postVisibility"]) || empty($_POST["postText"])) {
        echo "Both postVisibility and postText are required fields.";
        exit; // Stop script execution
    }

    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $postVisibility = $_POST["postVisibility"];
    $postText = $_POST["postText"];

    // Handle file uploads
    $targetDir = "uploads/";
    $postImage = $targetDir . basename($_FILES["postImage"]["name"]);
    $emojiImage = $targetDir . basename($_FILES["emojiImage"]["name"]);

    move_uploaded_file($_FILES["postImage"]["tmp_name"], $postImage);
    move_uploaded_file($_FILES["emojiImage"]["tmp_name"], $emojiImage);

    // SQL query with prepared statement to insert data into the database
    $sql = "INSERT INTO posts (username, visibility, post_text, post_image, emoji_image)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $_SESSION["username"], $postVisibility, $postText, $postImage, $emojiImage);

    if ($stmt->execute()) {
        echo "Post created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
