<?php
session_start();
unset($_SESSION["userIdentifier"]);
unset($_SESSION["userName"]);
unset($_SESSION['RefUrl']);
header("Location:login.php");

?>