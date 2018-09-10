<?php
    include_once 'header.php';
    if(empty($_SESSION['user_id'])) {
        header("location: ./login.php");
    }
?>

<nav class="navbar shadow navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><img class="shadow-lg rounded mr-3" src="../assets/logo/logo1.png" alt="SRS Inc." width="45" height="45">SRS Inc.</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">
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
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mt-5 ">
        <h3 class="text-primary text-center">
            Admin Panel
        </h3>
        <hr>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">User Name</div>
                <div class="col">Customer Name</div>
                <div class="col">Product</div>
            </div>
            <div class="row">
                <div class="col"><button class="btn btn-sm btn-danger"><i class="fa fa-envelope"> &nbsp; Mail</i></button></div>
                <div class="col"><button class="btn btn-sm btn-primary"><i class="fa fa-truck">&nbsp; Delivered</i></button></div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>
