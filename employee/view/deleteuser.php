<?php
include '../control/deleteuser_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/mystyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 id="print">Delete User</h1>
    <form action="../control/deleteuser_control.php" method="post">
        <table>
        <tr>
        <td><label for="ID">ID:</label></td>
        <td><input type="hidden" name="id" value="<?php echo $id;?>"></tr></td>

       <tr><td> <label for="f_name">Name:</label> <?php echo $Name;?></tr></td>

       <tr><td><label for="e_name">Email:</label> <?php echo $email;?></tr></td>

       <tr><td> <label for="phoneNumber">Phone Number:</label> <?php echo $phone;?></tr></td>

       <tr><td><label for="address">Address:</label> <?php echo $Address;?></tr></td>

       <tr><td><label for="dob">Date of Birthday:</label> <?php echo $DOB;?></tr></td>

       <tr><td> <label for="gender">Gender:</label> <?php echo $Gender;?></tr></td>

       <tr><td><label for="nid">NID Number:</label> <?php echo $Nid;?></tr></td>

       <tr><td><label for="userid">Uaer ID:</label> <?php echo $Userid;?></tr></td>

       <tr><td> <label for="emprole">Employee Role:</label> <?php echo $Emprole;?></tr></td>

       <tr><td> <label for="profile">Profile Picture:</label> <?php echo $profile_Picture;?></tr></td>

</table>
    <input class='button-update' type="submit" value="Delete" name = "delete">
    <a href="showuser.php" class="button-update">Back to User List</a>
    </form>
</body>
</html>