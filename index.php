<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 5:49 PM
 */

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
                    data: {
                        action: "login",
                        username: $("#username").val(),
                        password: $("#password").val()
                    },
                    success: function (result) {
                        if (result === "<p>Logged in!</p>") {
                            alert("Logged in successfully");
                            window.location.href = "profilePage.php";
                        } else {
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
                    data: {
                        action: "login",
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
    </head>
    <body>


        <div id="signupform">
            <label for="username">Username</label><input type="text" id="username">
            <label for="password">Password</label><input type="password" id="password">
        </div>
        <button id="login" onclick="login()">Log in</button>
        <button id="signup" onclick="signup()">Sign up</button>
    </body>



</html>
