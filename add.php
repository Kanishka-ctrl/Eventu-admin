<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkblue;
            background-image: url('images/hi.jpg'); /* Add your background image URL */
            background-size: cover;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }

        .event-form {
            max-width: 500px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9); /* Add a semi-transparent white background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .event-form label {
            font-weight: bold;
        }

        .event-form input[type="text"],
        .event-form input[type="number"],
        .event-form textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .event-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .event-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Add New Event</h1>
    
    <!-- Event form -->
    <div class="event-form">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="event_name">Event Name:</label>
            <input type="text" name="event_name" required><br>

            <label for="event_description">Event Description:</label>
            <textarea name="event_description" required></textarea>

            <label for="event_short_desc">Short Description:</label>
            <input type="text" name="event_short_desc" required>

            <label for="event_image">Image URL:</label>
            <input type="text" name="event_image" required>

            <label for="event_seats">Total Seats:</label>
            <input type="number" name="event_seats" required>

            <label for="event_venue">Venue:</label>
            <input type="text" name="event_venue" required>

            <label for="event_price">Ticket Price:</label>
            <input type="number" name="event_price" required>

            <input type="submit" value="Add Event">
        </form>
    </div>
    
    <a href="admin_event.php">Back to Admin Events</a>
</body>
</html>
