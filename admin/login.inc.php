<?php

include_once '../includes/dbh.inc.php';
session_start();

if(isset($_POST['submit'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_pwd = mysqli_real_escape_string($conn, $_POST['pwd']); 
    $user_hash = md5($user_pwd);   
    if($user_name == "admin") {
        $sql = "select user_id from tbl_users where user_name = '".$user_name."' and user_pwd = '".$user_hash."'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count < 1) {
            header("location: ./login.php?error=incorrect_details");
            exit();
        }
        else {
            $sql1 = "select user_id, user_name, user_email, user_mobile from tbl_users where user_name = '".$user_name."'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);
            $_SESSION['user_id'] = $row1['user_id'];
            $_SESSION['user_name'] = $row1['user_name'];
            $_SESSION['user_email'] = $row1['user_email'];
            $_SESSION['user_mobile'] = $row1['user_mobile'];
            header("location: ./index.php");
            exit();
        }
    }
    else {
        header("location: ./login.php?error=incorrect_details");
        exit();
    }
}

?>