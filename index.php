<?php

session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: view/login.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: view/login.php");
}

?>

<p>Welcome to index</p>


<a href="index.php?logout=true">Logout</a>