<?php
    include_once './includes/dbh.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SRS Inc.</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/forum.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="./assets/css/mdb.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar shadow navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><img class="shadow-lg rounded mr-3" src="./assets/logo/logo1.png" alt="SRS Inc." width="40" height="40">SRS Inc.</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="collapse_target">
            <form class="navbar-form ml-auto" role="search">
                <div class="input-group add-on">
                    <input class="form-control  mt-1 " placeholder="Search" name="srch-term" id="srch-term" type="text" size="40">
                    <div class="input-group-btn">
                    <button class="btn btn-md p-2 rounded btn-warning" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-1">
                    <a href="index.php" class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ml-1">
                    <a href="forum.php" class="nav-link">Forum</a>
                </li>
                <li class="nav-item ml-1">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item ml-1">
                    <a href="login.php" class="nav-link">Login/Register</a>
                </li>
                
                <li class="nav-item dropdown ml-1 mr-2">
                    <a href="#" class="nav-link dropdown-toggle" id="dropdown_target" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello,User<?php //echo $_SESSION['user_name'];?>
                    <span class="caret"></span></a>
                    <div class="dropdown-menu mt-2" aria-labelledby="dropdown_target" style="">
                        <a class="dropdown-item text-primary" href="#"><i class="fas fa-user-cog"></i>Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My Products</a>
                        <div class="dropdown-divider"></div>
                        <form action="./includes/logout.inc.php" name="logout" method="post">
                        <a class="dropdown-item"><button type="submit" name="submit"  style="background:none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">Logout</button></a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>