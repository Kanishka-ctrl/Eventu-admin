<!DOCTYPE html>
<html>
<head>
    <title>Update or Delete Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/hi.jpg') center/cover no-repeat;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #007BFF;
            font-size: 36px;
            margin: 20px 0;
        }

        .container {
            max-width: 600px; /* Reduce the width of the container */
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<!-- <h1>Update or Delete Event</h1> -->
<?php include 'header.php'; ?>
<div class="container">
<?php
include("db.php"); // Include your database connection script


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_event'])) {
        // Handle event update
        $event_id = $_POST['event_id'];
        $new_name = $_POST['new_name'];
        $new_description = $_POST['new_description'];
        $new_short_desc = $_POST['new_short_desc'];
        $new_image = $_POST['new_image'];
        $new_seats = $_POST['new_seats'];
        $new_venue = $_POST['new_venue'];
        $new_price = $_POST['new_price'];

        // Update the event details in the database using prepared statements
        $query = "UPDATE eventlist SET Name = ?, Description = ?, Short_desc = ?, image = ?, seats = ?, Venue = ?, price = ? WHERE eventId = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssii", $new_name, $new_description, $new_short_desc, $new_image, $new_seats, $new_venue, $new_price, $event_id);

        if ($stmt->execute()) {
            // Event details updated successfully
            echo "Event updated successfully.";
        } else {
            // Error occurred while updating the event
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['delete_event'])) {
        // Handle event deletion
        $event_id = $_POST['event_id'];

        // Delete the event from the database using prepared statements
        $query = "DELETE FROM eventlist WHERE eventId = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $event_id);

        if ($stmt->execute()) {
            // Event deleted successfully
            echo "Event deleted successfully.";
        } else {
            // Error occurred while deleting the event
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>



    <form action="update.php" method="post">
        <label for="event_id">Event ID:</label>
        <input type="text" name="event_id" required><br>
        <label for="new_name">New Event Name:</label>
        <input type="text" name="new_name"><br>
        <label for="new_description">New Description:</label>
        <input type="text" name="new_description"><br>
        <label for="new_short_desc">New Short Description:</label>
        <input type="text" name="new_short_desc"><br>
        <label for="new_image">New Image URL:</label>
        <input type="text" name="new_image"><br>
        <label for="new_seats">New Number of Seats:</label>
        <input type="text" name="new_seats"><br>
        <label for="new_venue">New Venue:</label>
        <input type="text" name="new_venue"><br>
        <label for="new_price">New Price:</label>
        <input type="text" name="new_price"><br>
        <button type="submit" name="update_event">Update Event</button>
        <button type="submit" name="delete_event">Delete Event</button>
    </form>
</div>
</body>
</html>
