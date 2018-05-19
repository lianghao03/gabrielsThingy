<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 6:34 PM
 */
require "vendor/autoload.php";
require "generated-conf/config.php";
use HkDB\User;
use HkDB\UserQuery;

session_start();
if (!$_SESSION["loggedIn"] == true) {
    header("Location: index.php");
}

if (isset($_GET["a"]) && $_GET["a"] == "logout") {
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


?>
<!DOCTYPE html>
<html>

    <head>
        <title>Dashboard / Veltios</title>
        <script>
            function logout() {
                window.location.href = "profilePage.php?a=logout"
            }
        </script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto');
            html {
                font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>

    <body>

    Welcome, <?php echo($_SESSION["username"]) ?>!
    <br />
    Points: <?php echo($_SESSION["points"]) ?>
    <button id="logout" onclick="logout()">Log out</button>

    <div id="explore">
        <h1>Explore</h1>
        <h2>Trending users</h2>
        <a href="">
            <img src="https://yt3.ggpht.com/-1o9cObquo_s/AAAAAAAAAAI/AAAAAAAAAAA/xCSL7IuyGDU/s288-mo-c-c0xffffffff-rj-k-no/photo.jpg">
            <br>
            <h2>Binner</h2>
        </a>

    </div>


    <div id="learn">
        <h1>Learn</h1>
        <h2>New Videos</h2>
        <div id="videos">

            <a href="watchVideo.php?v=OwMoXjyUCPs">
                <img src="https://i.ytimg.com/vi/OwMoXjyUCPs/hqdefault.jpg?sqp=-oaymwEZCPYBEIoBSFXyq4qpAwsIARUAAIZCGAFwAQ==&rs=AOn4CLA5pgjmKmA9VxBYGI9uYvI_fNXQbw">
                <p>this GUILD TAG might get me BANNED...</p>
            </a>


        </div>
    </div>

    </body>
</html>
