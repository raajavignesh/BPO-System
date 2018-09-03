<?php

include_once '../includes/dbh.inc.php';
session_start();

if (isset($_POST['submit'])) {
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php");
    exit();
}
?>