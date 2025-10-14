<?php
file_put_contents("../history.txt", "");
header("Location: ../calculator.php");
/*
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_clear"])) {
    file_put_contents("history.txt", "");
    header("Location: calculator.php");
}
*/
?>
