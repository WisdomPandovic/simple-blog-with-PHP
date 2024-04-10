<?php
// Start the session
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    // Return the username
    echo $_SESSION['username'];
} else {
    // Return an empty string if the username is not set
    echo '';
}
?>
