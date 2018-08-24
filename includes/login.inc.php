<?php
include_once 'dbh.inc.php'
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $user_pwd = mysqli_real_escape_string($conn, $_POST['pwd0']);
    $sql = "select user_id from tbl_users where user_email='$user_email' user_pwd='$user_pwd'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count < 1)
    {
        exit();
        header("location: login.php");
    }
    else
    {
        $_SESSION['user_name'] = $user_email;
        header("location: index.php");
    }
}

?>