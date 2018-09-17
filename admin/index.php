<?php
    include_once 'header.php';
    if(empty($_SESSION['user_id'])) {
        header("location: ./login.php");
    }
?>

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
