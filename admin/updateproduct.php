<?php
    include_once 'header.php';
    if(empty($_SESSION['user_id'])) {
        header("location: ./login.php");
    }
?>

<div class="container shadow" style="margin-top:150px">
    <div class="row">
        <div class="col text-center">
            <h3 class="text-primary font-weight-bold">Product Details</h3>
        </div>
    </div>
    <hr>
    <form action="./uploadproduct.inc.php" class="p-4" method="post" enctype="multipart/form-data">
    <div class="row p-3">
            <div class="col-3">
                <h5>Product Name</h5>
            </div>
            <div class="col-8 offset-1">
                <input type="text" name="productname" id="productname" class="form-control">    
            </div> 
        </div>
        <div class="row p-3">
            <div class="col-3">
                <h5>Product Description</h5>
            </div>
            <div class="col-8 offset-1">
                <textarea name="productinfo" id="productinfo" class="form-control" cols="30" rows="5"></textarea>
            </div> 
        </div>
        <div class="row p-3">
            <div class="col-3">
                <h5>Price</h5>
            </div>
            <div class="col-8 offset-1">
                <input type="number" name="price" id="price" class="form-control">
            </div> 
        </div>
        <div class="row p-3">
            <div class="col-3">
                <h5>Product Image</h5>
            </div>
            <div class="col-8 offset-1">
                <input type="file" name="image" id="image">
            </div> 
        </div>
        <hr>
        <div class="row justify-content-center">
            <button class="btn btn-primary" name="submit" type="submit" value="UPLOAD">Upload</button>
        </div>
    </form>
</div>

<?php
    include_once 'footer.php';
?>
