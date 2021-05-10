<?php
session_start();
unset($_SESSION["userIdentifier"]);
unset($_SESSION["userName"]);
unset($_SESSION['RefUrl']);
session_destroy();
header("Location:../login.php");

?>