<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 19-May-18
 * Time: 8:59 PM
 */

session_start();
if(!isset($_SESSION["loggedIn"]))
    header("Location: index.php");

if (!isset($_GET["v"]))
    header("Location: profilePage.php");

$_SESSION["points"] += 30;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Video player</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function quizNow(quizName) {
            window.location.href = 'takeExam.php?quizId=' + quizName
        }
    </script>

</head>
<body>
<button id="back" onclick="window.location.href = 'index.php'">Back to home</button>
<button id="takeQuiz" onclick="quizNow('<?php echo $_GET["v"]?>')">Take the quiz</button>
<br />
<br />
<?php
echo "<div style=\"position:relative;height:0;padding-bottom:50%\"><iframe src=\"https://www.youtube.com/embed/".$_GET['v']."?ecver=2\" style=\"position:absolute;width:70%;height:80%;left:0\" width=\"500\" height=\"300\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe></div>";
?>


<div id="#quiz">

</div>

</body>
</html>

