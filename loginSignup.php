<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 6:06 PM
 */

require_once "vendor/autoload.php";
require_once "generated-conf/config.php";

use HkDB\User;
use HkDB\UserQuery;
use Propel\Runtime\Exception\PropelException;


if (isset($_POST)) {
    $uQ = new UserQuery();

    if ($_POST["action"] == "login"){
        $usr = $uQ::create()->findOneByUsername($_POST["username"]);
        if (password_verify($_POST["password"], $usr->getPassword())) {
            // logged in
            echo "<p>Logged in!</p>";
            session_name($_POST["username"]);
            session_start();
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["loggedIn"] = true;

        } else {
            echo "<p>Access denied. Incorrect username or password.</p>";
        }
    } else if ($_POST["action"] == "signup") {
        $user = $uQ::create()->findOneByUsername($_POST["username"]);

        if ($user) {
            echo "<p>Username already chosen. Please choose something else</p>";
        } else {
            $signedup = new User();
            $signedup->setUsername($_POST["username"]);
            $signedup->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
            try {
                echo "<p>Signed up successfully!</p>";
                $signedup->save();
                // signed up now
                session_name($_POST["username"]);
                session_start();
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["loggedIn"] = true;
            } catch (PropelException $propelException) {
                echo $propelException->getTraceAsString();

            }
        }
    }



} else {
    echo "No Data";
}