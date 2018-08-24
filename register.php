<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
?>

<div class="container" style="padding-top:100px;">
    <div class="wrapper">
        <div class="company-info">
            <h3>SRS Inc.</h3>
            <ul>
                <li><i class="fa fa-road"></i> Trichy-620012</li>
                <li><i class="fa fa-phone"></i> 9876543210</li>
                <li><i class="fa fa-envelope"></i> srscustomerhelp@gmail.com</li>
            </ul>
        </div>
        <div class="submit">
            <h3>Registration</h3>
            <form id="registerForm"  action="includes/register.inc.php" method="POST">
                <div class="full">
                    <label><i class="fa fa-user"></i> User Name</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label><i class="fa fa-phone"></i> Mobile</label>
                    <input type="text" name="phone">
                </div>
                <div>
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="emailid">
                </div>
                <div class>
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="pwd0">
                </div>
                <div class>
                    <label><i class="fa fa-key"></i> Confirm Password</label>
                    <input type="password" name="pwd1">
                </div>
                <div class="full">
                    <button type="submit">SIGNUP</button>
                </div>
                <div class="full">
                    <label>Already have an account ?<a href="login.php">Login here</a></label>
                </div>
            </form>
        </div>
    </div>
</div>