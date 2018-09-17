<?php


define("DB_HOST", "localhost");
define("DB_NAME", "bpo");
define("DB_USER", "root");
define("DB_PASS", "");

define("MAX_SIZE_ALLOWED", 1048576); 

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn == false)
{
    die("Error: Could not connect. " . mysqli_connect_error());
}

?>