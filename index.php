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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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

            var usrType;
            function selectUser() {
                usrType = "user";
                $("#selectUsrTypeBtn").html("User")
            }

            function selectEmployer() {
                usrType = "employer";
                $("#selectUsrTypeBtn").html("Employer")
            }
            function signup() {

                if (!$("#select").html().trim().length) {
                    $("#select").html(
                        '<div class="dropdown">' +
                        '   <button class="btn btn-secondary dropdown-toggle" type="button" id="selectUsrTypeBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '       User or Employer?' +
                        '   </button>' +
                        '   <div class="dropdown-menu" aria-labelledby="selectUsrTypeBtn">' +
                        '       <a class="dropdown-item" href="#" onclick="selectUser()">User</a>' +
                        '       <a class="dropdown-item" href="#" onclick="selectEmployer()">Employer</a>' +
                        '   </div>' +
                        '</div>'
                    );
                } else {

                    $.ajax({
                        url: "loginSignup.php",
                        type: "POST",
                        data: {
                            action: "signup",
                            username: $("#username").val(),
                            password: $("#password").val(),
                            usertype: usrType
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
                            alert("Some error occured while trying to sign up you. Please try again");
                        }

                    });
                }


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

    <div class="container" style="padding-top: 3%">
        <div class="jumbotron">
            <h1 style="text-align: center">Veltios</h1>
            <h2 style="text-align: center">Learning, Redefined.</h2>
        </div>
    </div>


    <div class="container">
        <div class="jumbotron">
            <div id="signupform">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username">

                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" id="password">

                </div>

            </div>
            <div id="select" style="padding-bottom: 1.3%;">

            </div>
            <button id="login" class="btn btn-primary" onclick="login()">Log in</button>
            <button id="signup" class="btn btn-secondary" onclick="signup()">Sign up</button>


        </div>
    </div>

    </body>





</html>
