<?php
// Check if the user is an admin
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php'); // Redirect to the login page
    exit();
}

// Include your database connection
include_once("db.php"); // Replace with your database connection script

if (isset($_GET['eventId']) && is_numeric($_GET['eventId'])) {
    $eventId = $_GET['eventId'];

    // SQL to delete the event
    $sql = "DELETE FROM eventlist WHERE eventId = $eventId";

    if ($conn->query($sql) === TRUE) {
        echo "Event with ID $eventId has been deleted.";
    } else {
        echo "Error deleting event: " . $conn->error;
    }
} else {
    echo "Invalid event ID.";
}

// Close the database connection
$conn->close();
?>
