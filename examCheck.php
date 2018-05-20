<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 10:56 PM
 */


session_start();
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

if (isset($_GET["qn1"]) && isset($_GET["qn2"]) && isset($_GET["qn3"])) {

    $score = 0;
    if ($_GET["qn1"] == $quiz[0]["correct"]) {
        echo "Q1 correct. Score +1<br>";
        $score += 1;
    } else {
        echo "Q1 wrong. Correct ans: A<br>";
    }

    if ($_GET["qn2"] == $quiz[1]["correct"]) {
        echo "Q2 correct. Score +1<br>";
        $score += 1 ;
    } else {
        echo "Q2 wrong. Correct ans: C<br>";
    }

    if ($_GET["qn3"] == $quiz[2]["correct"]) {
        echo "Q3 correct. Score +1<br>";
        $score += 1;
    } else {
        echo "Q3 wrong. Correct ans: B<br>";
    }


    echo "Final score: $score <br/>";
    echo "<button onclick='window.location.href = \"profilePage.php\"'>Return to Dashboard</button>";

    $_SESSION["points"] += $score * 10;
}

