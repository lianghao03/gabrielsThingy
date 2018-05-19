<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 9:16 PM
 */


if (isset($_GET["quizId"])) {
    if ($_GET["quizId"] == "OwMoXjyUCPs") {
        echo "<button id='end' onclick='window.location.href = \"watchVideo.php?v=".$_GET["quizId"]."\"'>End Quiz</button>";
        echo "<iframe width='100%' height='100%' src='https://offbeat.topix.com/quiz/16583'></iframe>";
    }
}