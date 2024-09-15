<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <!-- Add your CSS styles here -->
</head>

<body>
    <?php include('header.php'); ?>
    
    <div class="admin-container">
        <?php include('sidebar.php'); ?>

        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Admin Dashboard</h2>
                        <i class="fas fa-user" style="background-color: #4547cf"></i>
                    </div>

                    <div class="admin-options">
                        <a href="add_event.php">Add Event</a>
                        <a href="edit_event.php">Edit Event</a>
                        <a href="delete_event.php">Delete Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method='post' action="">
        <input type='submit' value="Logout" name="but_logout">
    </form>

    <?php include('footer.php'); ?>
    <script src="../scripts/jquery-3.3.1.min.js"></script>
    <script src="../scripts/owl.carousel.min.js"></script>
    <script src="../scripts/script.js"></script>
</body>

</html>
