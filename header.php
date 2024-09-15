<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Add your custom CSS styles here -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
    /* Custom styles for the header */
   
   .header {
  /* background-image: url('images/f2.jpg'); */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

   .header-background {
    /* background-image: url('/images/f3.jpg'); */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: black;
}

   
    nav {
    display: flex;
    justify-content: space-between; /* Adjusted to space between items */
    align-items: center;
    height: 100px;
    /* background-color: black; */
    width: 100%;
    margin: 0; /* Remove margin */
}


    nav ul {
        list-style: none; /* Remove default list styles */
        padding: 0; /* Remove padding */
        display: flex;
    }

    nav ul li {
        margin: 0 23px;
    }

    nav ul li a {
        text-decoration: none;
        color: white;
        font-weight: 600;
    }

    nav ul li a:hover {
        color: rgb(111, 111, 173);
        font-size: 1.04rem;
    }

    .navbar-toggler-icon {
        background-color: #000;
    }

    .container {
        width: 100%; /* 100% width to span the entire viewport */
        max-width: 1200px;
        margin: 0 auto; /* Center the content in the container */
    }

    .navbar-brand {
        font-family: 'Open Sans', sans-serif;
        font-size: 36px;
        color: white;
        text-shadow: 2px 2px 4px #000;
        transition: color 0.3s;
    }

    .navbar-brand:hover {
        color: #ff6600;
        animation: glow 1s infinite alternate;
    }

    @keyframes glow {
        0% {
            text-shadow: 2px 2px 4px #000;
        }
        100% {
            text-shadow: 2px 2px 8px #ff6600;
        }

    }

    .dropdown-menu {
        background: #2a5298;
    }
</style>

</head>
<body>


    <header class="header_section header-background">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <span>
              Eventu
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="myevents.php"> My Events </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add.php"> Add Event </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="update.php"> Modify Event </a>
                </li>
                
              </ul>
             
                <ul class="navbar-nav ml-auto">
                <li style="margin-left: auto;"> <!-- Add this line to align to the right -->
    <button id="login_btn" style="display: inline; margin-right: 10px;" type="button" class="btn btn-info btn-round" onclick="openLoginModal();">
        Login
    </button>
</li>

               
                    <button id="logout_btn" style="display:none;" type="button" class="btn btn-info btn-round" onclick="window.location.href='logout.php';">
                        Logout
                    </button>
                </li>
                <?php
                    if (!empty($_SESSION['user'])) {
                        $userId = $_SESSION['user'];
                        $res = $conn->query("select * from user where userId='$userId';");
                        $row = $res->fetch_object();
                        echo "<li class='navbar-text' id='username'>" . strtoupper($row->userName) . "</li>";
                        echo "<script type='text/javascript'> chg_to_logout(); </script>";
                    }
                ?>
            </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
</body>
</html>
