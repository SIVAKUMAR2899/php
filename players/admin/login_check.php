<?php
    include("../config/constants.php");
    include('login.php');
   
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-message'] = "<div class='error'>Please login.</div>";

    header('location:'.SITEURL.'admin/login.php');
}


?>
   