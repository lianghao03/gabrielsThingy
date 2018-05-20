<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 9:16 PM
 */

session_start();

if (!$_SESSION["loggedIn"] == true)
    header("Location: index.php");

if (!isset($_GET["quizId"]))
    header("Location: profilePage.php");



$quiz = Array(
        Array(
                "qnnumber" => 1,
                "qn" => "How do you display Hello World in Python 3?",
                "choices" => Array(
                        "a" => 'print("Hello World")',
                        "b" => 'print "Hello World"',
                        "c" => 'print("Hello World");'
                ),
                "correct" => "a"
        ),
    Array(
        "qnnumber" => 2,
        "qn" => "What does NVIDIA produce?",
        "choices" => Array(
            "a" => 'Graphics Cards',
            "b" => 'CPUs',
            "c" => 'Both'
        ),
        "correct" => "c"
    ),
    Array(
        "qnnumber" => 3,
        "qn" => "Is Python 3 backwards compatible with Python 2?",
        "choices" => Array(
            "a" => 'Yes',
            "b" => 'No'
        ),
        "correct" => "b"
    ),

);



?>


<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Take Quiz</title>
</head>

<body>

<script>
    function submit() {

        $.ajax({
            url: "examCheck.php",
            data: {
                qn1: $('input[name=question1]:checked').val(),
                qn2: $('input[name=question2]:checked').val(),
                qn3: $('input[name=question3]:checked').val()
            },
            success: function(result) {

                $("#results").html(result)
            },
            error: function() {
                alert("There was something wrong trying to submit your quiz. Please try again later");
            }
        })
    }
</script>

<div id="quiz">

    <?php
    foreach ($quiz as $question) {
        echo <<<EOF
<p>Question {$question["qnnumber"]}: {$question["qn"]}</p>

EOF;

        foreach ($question["choices"] as $letter => $choice) {
            echo <<<EOF
<input type="radio" name="question{$question['qnnumber']}" value="$letter"> $choice <br />
EOF;
        }

    }
    ?>

</div>
<br />
<button id="submit" onclick="submit()">Submit Quiz</button>
<button onclick="window.location.href = 'profilePage.php'">Return to Dashboard</button>
<div id="results"></div>


</body>

</html>
