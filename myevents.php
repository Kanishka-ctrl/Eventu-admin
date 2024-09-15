<?php
// Include your database connection
include("db.php"); // Replace with your database connection script

// Fetch all events from the database
$query = "SELECT * FROM eventlist";
$result = $conn->query($query);

// Fetch the events and display them
$events = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Events</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    background-image: url('images/hi.jpg');
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
    text-shadow: 0 0 5px pink;
    color: white;
    font-size: 36px;
}

.event-list {
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
}

.event {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    background: #fff;
    transition: transform 0.2s;
}

.event:hover {
    transform: scale(1.02);
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
}

.event h2 {
    margin: 0;
    color: #333;
    font-size: 24px;
}

.event p {
    margin: 10px 0;
    color: #666;
}

.event p:first-child {
    font-weight: bold;
}

/* Add some spacing between events */
.event:not(:last-child) {
    margin-bottom: 30px;
}

        /* body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('images/hi.jpg');
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            text-shadow: 0 0 5px pink; color: white;
        }
      

        .event-list {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .event {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .event h2 {
            margin: 0;
            color: #333;
        }

        .event p {
            margin-top: 5px;
            color: #666;
        } */
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <!-- <h1 >All Events</h1> -->

    <div class="event-list">
        <?php if (!empty($events)) : ?>
            <?php foreach ($events as $event) : ?>
                <div class="event">
                    <h2><?php echo $event['Name']; ?></h2>
                    <p>Description: <?php echo $event['Description']; ?></p>
                    <p>Short Description: <?php echo $event['Short_desc']; ?></p>
                    <p>Venue: <?php echo $event['Venue']; ?></p>
                    <p>Price: Rs.<?php echo $event['price']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No events found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
