<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 20-May-18
 * Time: 9:24 AM
 */


session_start();

if (!$_SESSION["loggedIn"] == true)
    header("Location: index.php");

if ($_SESSION["usrType"] == "user")
    header("Location: profilePage.php");




?>
<!DOCTYPE html>
<html>

    <head>
        <title>Employer Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="profilePage.php">VELTIOS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="" id="navbarLinks">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#" >Explore Users</a>
                    <a class="nav-item nav-link" href="#" >Hiring Preferences</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["username"] ?>'s profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profile">
                            <a class="dropdown-item" href="profilePage.php?a=myprofile">View profile</a>
                            <a class="dropdown-item" href="profilePage.php?a=editProfile">Edit profile</a>
                            <a class="dropdown-item" href="profilePage.php?a=logout">Log out</a>
                        </div>

                    </div>

                    <form class="form-inline" >
                        <div class="search-box">
                            <input class="form-control mr-sm-2" id="search" type="search" placeholder="User" aria-label="Search">
                            <div class="results"></div>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="livesearch()">Search</button>
                    </form>

                </div>

            </div>
        </nav>

        <div id="contents">
            <section id="exploreUsrs">
                <div class="container">
                    <h1>Explore Users</h1>

                </div>
            </section>
            <section id="hiringPrefs">
                <div class="container">

                </div>
            </section>
        </div>
    </body>
</html>
