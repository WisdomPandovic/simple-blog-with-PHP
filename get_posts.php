<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

$posts = [];
if ($result->num_rows > 0) {
    // Fetch posts data
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Close connection
$conn->close();

// Return posts data as JSON
header('Content-Type: application/json');
echo json_encode($posts);
?>
