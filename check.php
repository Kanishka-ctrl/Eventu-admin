<!DOCTYPE html>
<html>
<head>
    <title>Booked Users</title>
</head>
<body>
<?php
include("db.php"); // Include your database connection script

// Check if event_id is provided in the URL
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Fetch the details of users who booked seats for the specified event
    $query = "SELECT userId, no_of_tickets FROM booked_tickets WHERE UniqueId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h1>Users who booked seats for this event:</h1>";
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['userId'];
                $num_tickets = $row['no_of_tickets'];

                // You can display user details or any other information you want
                echo "User ID: $user_id, Tickets Booked: $num_tickets<br>";
            }
        } else {
            echo "No users have booked seats for this event.";
        }
    } else {
        echo "Error fetching user details.";
    }
} else {
    echo "Event ID not provided in the URL.";
}
?>
</body>
</html>
