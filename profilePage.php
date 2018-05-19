<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 6:34 PM
 */
require "vendor\autoload.php";
use HkDB\User;
use HkDB\UserQuery;

session_start();
if ($_SESSION["loggedIn"] == true) {
    // stay
} else {
    header("Location: index.php");
}




?>
<!DOCTYPE html>
<html>

    <head>
        <title>Your Profile</title>
    </head>

    <body>
    Some things! You're logged in! Your username is <?php echo($_SESSION["username"]) ?>!
    </body>
</html>
