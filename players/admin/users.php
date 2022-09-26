<?php include("../config/constants.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>USER DETAILS</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="header">
          <center><img src = "admin_logo.png" alt = "adminLogo" id="adminlogo"><center>
    </div>
    <div id="sidebar">
        <div class="wrapper">
            <ul>
                <li><a href="users.php">USERS</a></li>
            </ul>
        </div>
    </div>
    <div id="data">
            <div>
               <h1><center>USER DETAILS<center></h1>
                   <br />

                   <!-- <?php
                       if(isset($_SESSION['add']))
                       {
                        echo $_SESSION['add'];
                       } 
                       if(isset($_SESSION['delete']))
                       {
                        echo $_SESSION['delete'];
                       }
                   
                   ?> -->
                     <br /><br />

                     <a href="adduser.php" class="btn-primary">ADD USER</a>
                   <br /><br />
                <table style="width:80%">
                    <tr>
                       <th style="width:5%">ID</th>
                       <th style="width:10%">FIRSTNAME</th>
                       <th style="width:10%">LASTNAME</th>
                       <th style="width:6%">AGE</th>
                       <th style="width:9%">GENDER</th>
                       <th style="width:10%">CONTACT</th>
                       <th style="width:10%">EMAIL</th>
                       <th style="width:10%">UPDATE</th>
                       <th style="width:10%;">DELETE</th>
                    </tr>

                    <?php

                    $sql = "SELECT * FROM user";
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE)
                    {
                        $rows = mysqli_num_rows($res);

                        if($rows>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id = $rows['id'];
                                $firstname = $rows['firstname'];
                                $lastname = $rows['lastname'];
                                $age = $rows['age'];
                                $gender = $rows['gender'];
                                $contact = $rows['contact'];
                                $email = $rows['email'];

                                ?>

                                <tr>
                                   <td><?php echo $id; ?></td>
                                   <td><?php echo $firstname; ?></td>
                                   <td><?php echo $lastname; ?></td>
                                   <td><?php echo $age; ?></td>
                                   <td><?php echo $gender; ?></td>
                                   <td><?php echo $contact; ?></td>
                                   <td><?php echo $email; ?></td>
                                   <td>
                                     <a href="<?php echo SITEURL; ?>admin/updateuser.php?id=<?php echo $id; ?>" class="btn-secondary">UPDATE</a>
                                   </td>
                                   <td>
                                     <a href="<?php echo SITEURL; ?>admin/deleteuser.php?id=<?php echo $id; ?>" class="btn-danger">DELETE</a>
                                   </td>
                                </tr>

                                <?php

                            }
                        }else{

                        }
                    }
                    ?>
                <td></td>
            </div>  
    </div>
</body>
</html>