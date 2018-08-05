<?php
    include_once 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <a class="navbar-brand" href="index.php">SRS Inc.</a>
            </div>
            <div class="col-10">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="forum.php">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="care.php">Customer Care</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-1">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <li class="nav-item dropdown navbar-nav navbar-right">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        avatar
                        <img src="" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">My Orders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Login / Register</a>
                        </div>
                    </li>
                    </ul>
                </div>            
            </div>
        </div>
    </div>
</nav>
   

<?php
    include_once 'footer.php';
?>





