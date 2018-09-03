<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
?>

<div class="container " style="padding-top:150px;">
    <div class="wrapper">
        <div class="company-info">
        <img class="center shadow" src="./assets/logo/logo.png" width="150px">
            <h3 class="mt-4">SRS Inc.</h3>
            <ul>
                <li><i class="fa fa-road"></i> Trichy-620012</li>
                <li><i class="fa fa-phone"></i> 9876543210</li>
                <li><i class="fa fa-envelope"></i> srscustomerhelp@gmail.com</li>
            </ul>
            
        </div>
        <div class="submit">
            <h3>Login</h3>
            <form id="loginForm" action="./includes/login.inc.php" method="POST">
                <div class="full">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="emailid" id="emailid">
                </div>
                <div class="full">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="pwd0" id="pwd">
                </div>
                <div class="full">
                    <button type="submit" name="submit">LOGIN</button>
                </div>
                <div class="full">
                    <label>Not a member? &nbsp;<a href="register.php">Register here</a></label>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once 'footer.php';
?>
