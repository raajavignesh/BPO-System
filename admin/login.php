<?php
    include_once 'header.php';
?>

<div class="container">
    <div class="row" style="margin-top:150px;">
        <div class="shadow-lg rounded p-3 bg-white col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-10 offset-sm-1">
            <h4 class="text-center text-primary">Login</h4>
            <hr>
            <form action="./login.inc.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="User Name">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                </div>
                <hr>
                <button class="btn btn-primary btn-block" name="submit" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>


<?php
    include_once 'footer.php';
?>
