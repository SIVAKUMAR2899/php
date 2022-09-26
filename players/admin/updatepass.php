<?php include("../config/constants.php"); ?>

<div class="main-content">
    <div>
        <h1>UPDATE USER</h1>

        <br><br>

        <?php
        
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }

        ?>


        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Current password : </td>
                <td>
                    <input type="password" name="current_password" placeholder="Enter old pass">
                </td>
            </tr>
            <tr>
                <td>New password : </td>
                <td>
                    <input type="password" name="new_password" placeholder="Enter new pass">
                </td>
            </tr>
            <tr>
                <td>Confirm password : </td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Enter confirm pass">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Change pass">
                </td>
            </tr>
        </table>
         </form>
    </div>
</div>

<?php

if(isset($_POST['submit']))
{
    // $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    $sql = "SELECT * FROM user WHERE id=$id && password='$current_password'";

    $res = mysqli_query($conn,$sql);

    if($res==true)
    {
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            if($new_password == $confirm_password)
            {
                $sql2 = "UPDATE user SET password='$new_password' WHERE id=$id";

                $res2 = mysqli_query($conn,$sql2);

                if($res2==true)
                {
                    $_SESSION['change pass'] = "<div class='success'>pass changed successfully.</div>";
                    header('location:'.SITEURL.'admin/users.php'); 
                }else{
                    $_SESSION['change pass'] = "<div class='error'>pass changed failed.</div>";
                    header('location:'.SITEURL.'admin/users.php'); 
                }
            }else{
             $_SESSION['pass-not-match'] = "<div class='error'>pass Not match.</div>";
             header('location:'.SITEURL.'admin/users.php'); 
            }
        }else{
             $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
             header('location:'.SITEURL.'admin/users.php');
        }
    }
}

?>