<?php
session_start();

if (isset($_SESSION['session_username']) && !empty($_SESSION['session_username'])) {
    header("Location: auth/home.php");
    exit();
}
header("Location: login.php");
exit();
