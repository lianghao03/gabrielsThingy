<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 6:34 PM
 */
require "vendor/autoload.php";
require "generated-conf/config.php";

use HkDB\UserQuery;

session_start();
if (!$_SESSION["loggedIn"] == true) {
    header("Location: index.php");
}

if ($_SESSION["usrType"] == "employer")
    header("Location: employerDash.php");

if (isset($_GET["a"])) {
    if ($_GET["a"] == "logout") {
        $client = UserQuery::create()->findOneByUsername($_SESSION["username"]);

        try {
            $client->setLevel($_SESSION["points"])
                ->save();
        } catch (\Propel\Runtime\Exception\PropelException $pe) {
            echo $pe->getTraceAsString();
        }

        session_destroy();
        header("Location: index.php");
    }

    if ($_GET["a"] == "myProfile") {
        //TODO
    }

    if ($_GET["a"] == "editProfile") {
        //TODO
    }

}





?>
<!DOCTYPE html>
<html>

    <head>
        <title>Dashboard / Veltios</title>
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
                <a class="nav-item nav-link" href="#" onclick="$('#contents').moveTo(1)">Explore</a>
                <a class="nav-item nav-link" href="#" onclick="$('#contents').moveTo(2)">Learn</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION["username"] ?>'s profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profile">
                        <p class="dropdown-item">Points: <?php echo $_SESSION["points"]?></p>
                        <a class="dropdown-item" href="profilePage.php?a=myProfile">View profile</a>
                        <a class="dropdown-item" href="profilePage.php?a=editProfile">Edit profile</a>
                        <a class="dropdown-item" href="profilePage.php?a=logout">Log out</a>
                    </div>

                </div>

                <form class="form-inline" >
                    <div class="search-box">
                        <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search User or Video" aria-label="Search">
                        <div class="results"></div>
                    </div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="livesearch()">Search</button>
                </form>

            </div>

        </div>
    </nav>

    <div id="contents">

        <section id="explore" style="text-align: center">

                <h1>Explore</h1>
                <h2>Trending users</h2>
                <a href="">
                    <img src="https://yt3.ggpht.com/-1o9cObquo_s/AAAAAAAAAAI/AAAAAAAAAAA/xCSL7IuyGDU/s288-mo-c-c0xffffffff-rj-k-no/photo.jpg">
                    <br>
                    <h2>Binner</h2>
                </a>

        </section>


        <section id="learn" style="text-align: center;">

            <h1>Learn</h1>
            <h2>New Videos</h2>
            <div id="videos">

                <a href="watchVideo.php?v=Z1Yd7upQsXY">
                    <img src="https://i.ytimg.com/vi/OwMoXjyUCPs/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIZCGAFwAQ==&rs=AOn4CLA5pgjmKmA9VxBYGI9uYvI_fNXQbw">
                    <p>this GUILD TAG might get me BANNED...</p>
                </a>


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


        function livesearch() {
            var searchterm = $("#search").val();
            var results = $(".results");

            if (searchterm.length) {
                $.get("search.php", {q: searchterm}).done(function (data) {
                    results.html(data);
                })
            } else {
                results.empty();
            }
        }

        $(document).ready(function() {
            $('.search-box').find('input[type="text"]').on("keyup input", function () {
                livesearch();
            });
        });
    </script>
    </body>
</html>
