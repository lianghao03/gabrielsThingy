<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 5:49 PM
 */

session_start();
if (isset ($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true)
    header("Location: profilePage.php")

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Home</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function login() {
                $.ajax({
                    url: "loginSignup.php",
                    type: "POST",
                    data: {
                        action: "login",
                        username: $("#username").val(),
                        password: $("#password").val()
                    },
                    success: function (result) {
                        if (result === "LG") {

                            window.location.reload()
                        } else {
                            console.log(result);
                            alert("You have entered the wrong username or password");
                        }
                    },
                    error: function () {
                        alert("Something went wrong trying to log you in. Please try again");
                    }

                });
            }

            function signup() {
                $.ajax({
                    url: "loginSignup.php",
                    type: "POST",
                    data: {
                        action: "signup",
                        username: $("#username").val(),
                        password: $("#password").val()
                    },
                    success: function (result) {
                        if (result === "<p>Username already chosen. Please choose something else</p>") {
                            alert("That username is already taken.");
                        } else if (result === "<p>Signed up successfully!</p>"){
                            alert("You have signed up!");
                            window.location.href = "profilePage.php";
                        } else {
                            alert("Some error occured while trying to sign up you. Please try again");
                            console.log(result);
                        }
                    },
                    error: function () {
                        alert("DDD Some error occured while trying to sign up you. Please try again");
                    }

                });

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

        <h1>Veltios</h1>
        <h2>Learning, Redefined.</h2>

        <div id="signupform">
            <label for="username">Username </label><input type="text" id="username">
            <br />
            <label for="password">Password </label><input type="password" id="password">
        </div>
        <button id="login" onclick="login()">Log in</button>
        <button id="signup" onclick="signup()">Sign up</button>
    </body>





</html>
