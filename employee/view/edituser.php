<?php
include '../control/edituser_control.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../css/mystyle.css">
<!-- <script src="../js/myjs.js" defer></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h1 id="print">Edit User</h1>
    <form action="../control/edituser_control.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="old_profile_picture" value="<?php echo $profile_Picture; ?>">

        <table>
            <tr>
                <td><label for="id">ID:</label></td>
                <td><input type="text" id="ID" name="id" value="<?php echo $id; ?>" readonly></td>
                
            </tr>

            <tr>
                <td><label for="f_name">Name:</label></td>
                <td><input type="text" id="f_name" name="f_name" value="<?php echo $Name; ?>">
                </td>
                

            

            <tr>
                <td><label for="e_name">Email:</label></td>
                <td> <input type="text" id="e_name" name="e_name" value="<?php echo $email; ?>">
                </td></tr>
            

            <tr>
                <td><label for="phoneNumber">Phone Number:</label></td>
                <td><input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $phone; ?>">
                </td></tr>
            

            <tr>
                <td><label for="address">Address:</label></td>
                <td> <textarea id="address" name="address"><?php echo $Address; ?></textarea>
                </td></tr>
            

            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="date" id="dob" name="dob" value="<?php echo $DOB; ?>">
                </td></tr>
            

            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="Male" <?php if ($Gender == "Male") echo "checked"; ?>> Male
                    <input type="radio" id="female" name="gender" value="Female" <?php if ($Gender == "Female") echo "checked"; ?>> Female
                   
                </td>
            </tr>

            <tr>
                <td><label for="nid">NID Number:</label></td>
                <td> <input type="text" id="nid" name="nid" value="<?php echo $Nid; ?>">
                </td></tr>
            

            <tr>
                <td><label for="userid">User ID:</label></td>
                <td><input type="text" id="userid" name="userid" value="<?php echo $Userid; ?>">
                </td></tr>
    

            <tr>
                <td><label for="emprole">Employee Role:</label></td>
                <td>
                    <select id="emprole" name="emprole">
                        <option value="">Select Role</option>
                        <option value="Manager" <?php if ($Emprole == "Manager") echo "selected"; ?>>Manager</option>
                        <option value="Developer" <?php if ($Emprole == "Developer") echo "selected"; ?>>Developer</option>
                        <option value="HR" <?php if ($Emprole == "HR") echo "selected"; ?>>HR</option>
                        <option value="Accountant" <?php if ($Emprole == "Accountant") echo "selected"; ?>>Accountant</option>
                    </select>
                    </td>

                

            </tr>

            </select>

            <tr>
                <td> <label for="profile_picture">Profile Picture:</label></td>
                <td>
                    <img src="../uploadfile/<?php echo $profile_Picture; ?>" alt="Profile Picture" width="50px" height="50px">
                    <input type="file" id="profile_picture" name="profile_picture">
                    <span class="error-message"></span></td>
            </tr>

        </table>

        <input class='button-update' type="submit" value="update" name="update">
        <a href="showuser.php" class="button-update">Back to User List</a>
    </form>
    <!-- <a href="showuser.php" class="button-update">Back to User List</a> -->
</body>

</html>