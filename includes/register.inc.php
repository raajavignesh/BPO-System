<?php

include_once 'dbh.inc.php';
session_start();

if(isset($_POST['submit'])) {
    $user_email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['phone']);    
    $user_name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_pwd0 = mysqli_real_escape_string($conn, $_POST['pwd0']);
    $user_pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
    if(empty($user_email) || empty($user_phone) || empty($user_name) || empty($user_pwd0) || empty($user_pwd1)) {
        header("location: ../register.php?error=empty");
        exit();
    }
    else {
        if($user_pwd0 == $user_pwd1) {
            $sql = "select user_id from tbl_users where user_email = '".$user_email."' user_pwd = '".$user_pwd."'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if($count < 1) {
                $user_pwd = md5($user_pwd0);
                $sql = "insert into tbl_users(user_name, user_mobile, user_email, user_pwd) values ('".$user_name."', ".$user_phone.", '".$user_email."', '".$user_pwd."')";
                mysqli_query($conn, $sql);
                $sql1 = "select user_id, user_name, user_email, user_mobile from tbl_users where user_email = '".$user_email."'";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($result1);
                $_SESSION['user_id'] = $row1['user_id'];
                $_SESSION['user_name'] = $row1['user_name'];
                $_SESSION['user_email'] = $row1['user_email'];
                $_SESSION['user_mobile'] = $row1['user_mobile'];
                header("location: ../index.php");
                exit();
            }
            else {
                header("location: ../login.php?error=user_exists");
                exit();
            }
        }
        else {
            header("location: ../register.php?error=password");
            exit();
        }
    }
}
?>