<?php include("../config/constants.php"); ?>

<div class="main-content">
    <div>
        <h1>UPDATE USER</h1>

        <br><br>

        <?php 
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        if($res==true)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);

                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $age = $row['age'];
                $gender = $row['gender'];
                $contact = $row['contact'];
                $email = $row['email'];
            }else{
                header('location:'.SITEURL.'admin/users.php');
            }
        }
        
        ?>
        <form action="" method="POST">

        <table class="tbl-35">
            <tr>
                <td>ID : </td>
                <td><input type="text" name="id" value="<?php echo $id; ?>"></td>
            </tr>
            <tr>
                <td>FIRSTNAME : </td>
                <td><input type="text" name="firstname" value="<?php echo $firstname; ?>"></td>
            </tr>
            <tr>
                <td>LASTNAME : </td>
                <td><input type="text" name="lastname" value="<?php echo $lastname; ?>"></td>
            </tr>
            <tr>
                <td>AGE : </td>
                <td><input type="text" name="age" value="<?php echo $age; ?>"></td>
            </tr>
            <tr>
                <td>GENDER : </td>
                <td><input type="text" name="gender" value="<?php echo $gender; ?>"></td>
            </tr>
            <tr>
                <td>CONTACT : </td>
                <td><input type="text" name="contact" value="<?php echo $contact; ?>"></td>
            </tr>
            <tr>
                <td>EMAIL : </td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="UPDATE USER" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit']))
{

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $sql = "UPDATE user SET 
     firstname='$firstname',
     lastname='$lastname',
     age='$age',
     gender='$gender',
     contact='$contact',
     email='$email'
     WHERE id='$id'
    ";

    $resp = mysqli_query($conn,$sql);

    if($resp==TRUE)
    {
        $_SESSION['update'] = "User updated successfully";
        header("location:".SITEURL.'admin/users.php');
    }else{
        
        $_SESSION['update'] = "user updated failed";
        header("location:".SITEURL.'admin/updateuser.php');
    }
}

?>