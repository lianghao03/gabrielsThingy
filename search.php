<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 20-May-18
 * Time: 8:44 AM
 */

session_start();
if (!$_SESSION["loggedIn"] == true)
    header("Location: index.php");

$L = mysqli_connect("localhost", "gabtest", "gabtest", "gabtest");

if ($L === false) {
    echo "Error trying to look up!";
    exit(1);
}

if (isset($_GET["q"])) {
    $sql = "SELECT * FROM users WHERE username LIKE ?";

    if ($stmt = mysqli_prepare($L, $sql)) {

        $p_term = $_GET["q"]."%";
        mysqli_stmt_bind_param($stmt, "s", $p_term);


        if (mysqli_stmt_execute($stmt)) {
            $results = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($results) >0) {
                while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                    echo "<p>". $row["username"] . "</p>";
                }
            } else {
                echo "<p>No matches</p>";
            }
        } else {
            echo "There was an error trying to search";
        }
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($L);