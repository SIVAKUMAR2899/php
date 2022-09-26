<?php

include("../config/constants.php");

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id=$id";

$res = mysqli_query($conn,$sql);

if($res==true)
{
    $_SESSION['delete'] = "User deleted successfully";
    header('location:'.SITEURL."admin/users.php");
}else{
    $_SESSION['delete'] = "Failed to delete";
    header('location:'.SITEURL."admin/users.php");
}


?>