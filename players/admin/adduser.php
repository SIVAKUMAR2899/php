<?php include("../config/constants.php");?>
<link rel="stylesheet" href="../css/style.css">
<div class="main-content">
    <div>
        <h1>ADD USER<h1>

        <br><br>

        <form action="" method="POST">


        <table class="tbl-30">
            <tr>
                <td>ID: </td>
                <td><input type="text" name="id" placeholder="Enter your id"></td>
            </tr>
            <tr>
                <td>FIRSTNAME : </td>
                <td><input type="text" name="firstname" placeholder="Enter your fname"></td>
            </tr>
            <tr>
                <td>LASTNAME : </td>
                <td><input type="text" name="lastname" placeholder="Enter your lname"></td>
            </tr>
            <tr>
                <td>AGE : </td>
                <td><input type="text" name="age" placeholder="Enter your age"></td>
            </tr>
            <tr>
                <td>GENDER : </td>
                <td><input type="text" name="gender" placeholder="Enter your gender"></td>
            </tr>
            <tr>
                <td>CONTACT : </td>
                <td><input type="text" name="contact" placeholder="Enter your contact"></td>
            </tr>
            <tr>
                <td>EMAIL : </td>
                <td><input type="text" name="email" placeholder="Enter your email"></td>
            </tr>
            <tr>
                <td>PASSWORD : </td>
                <td><input type="password" name="password" placeholder="Enter your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="ADD USER" class="btn-secondary">
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
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user SET
        id='$id',
        firstname='$firstname',
        lastname='$lastname',
        age='$age',
        gender='$gender',
        contact='$contact',
        email='$email',
        password='$password'
    ";
    
    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==TRUE)
    {
        // echo "Data inserted";
        $_SESSION['add'] = "User added successfully";
        header("location:".SITEURL.'admin/users.php');
    }else{
        // echo "Failed to insert";
        $_SESSION['add'] = "user added failed";
        header("location:".SITEURL.'admin/adduser.php');
    }
    
}

?>