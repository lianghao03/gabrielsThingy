<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 20-May-18
 * Time: 9:24 AM
 */

require "vendor/autoload.php";
require "generated-conf/config.php";
use HkDB\UserQuery;

session_start();

if (!$_SESSION["loggedIn"] == true)
    header("Location: index.php");

if ($_SESSION["usrType"] == "user")
    header("Location: profilePage.php");

if (isset($_GET["a"]) && isset($_GET["skill"])) {

    if ($_GET["a"] == "addSkill") {

    }

    if ($_GET["a"] == "deleteSkill") {

    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Employer Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <script src="https://cdn.rawgit.com/peachananr/onepage-scroll/master/jquery.onepage-scroll.min.js"></script>
        <link rel="stylesheet" href="https://cdn.rawgit.com/peachananr/onepage-scroll/master/onepage-scroll.css">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto');
            html {
                font-family: 'Roboto', sans-serif;
            }

            #contents {
                text-align: center;
            }
            body {
                padding-top: 4em;
            }
        </style>
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="profilePage.php">VELTIOS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLinks">
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
                            <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search User" aria-label="Search">
                            <div class="results"></div>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="livesearch()">Search</button>
                    </form>

                </div>

            </div>
        </nav>
        <div id="contents">
            <section id="exploreUsrs">
                <h1>Explore Users</h1>

            </section>
            <section id="hiringPrefs">

                <h1>
                    Preferred skills
                </h1>

                <div id="prefSkills">
                    <?php
                    $usr = UserQuery::create()->findOneByUsername($_SESSION["username"]);
                    $skills = $usr->getSkills();

                    foreach ($skills as $skill) {
                        echo <<<EOF
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">$skill</h5>
        <a href="employerDash.php?a=deleteSkill&skill=$skill" class="btn btn-danger">Delete this skill</a>
    </div>
</div> 
EOF;

                    }
                    ?>
                </div>

                <h1>Discover skills</h1>

                <div id="discoverSkills">
                    <div class="card" style="width: 18rem">
                        <div class="card-body">
                            <h5 class="card-title">Python 3</h5>
                            <p class="card-text">Python is a programming language that is basically psuedocode</p>
                            <a href="employerDash.php?a=addSkill&skill=python3" class="btn btn-success">Prefer skill</a>
                        </div>
                    </div>

                </div>

            </section>
        </div>

        <script>
            $("#contents").onepage_scroll({
                sectionContainer: "section",
                easing: "ease",
                animationTime: 1000,
                pagination: false,
                updateURL: true,
                loop: false,
                keyboard: true,
                responsiveFallback: false,
                direction: "vertical"
            });
        </script>
    </body>
</html>
