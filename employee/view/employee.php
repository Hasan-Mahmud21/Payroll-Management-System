<?php
session_start();

// Retrieve old form values and errors if available
$oldData = $_SESSION['form_data'] ?? [];
$errors = $_SESSION['form_errors'] ?? [];

// Clear session errors after displaying
unset($_SESSION['form_data']);
unset($_SESSION['form_errors']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/mystyle.css">
    <script src="../js/myjs.js" defer></script>
    <title>Employee Registration Form</title>
    <style>
        .error-message { color: red; font-size: 14px; display: block; }
    </style>
</head>

<body>
    <h3 id="print">EMPLOYEE</h3>
    <button onclick="demoFunction('print')">Click</button>
    <a href="showuser.php" class="button-link">User List</a>

    <form action="../control/reg_control.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

        <fieldset>
            <legend>Profile Picture:</legend>
            <input type="file" id="profile_picture" name="profile_picture">
            <span class="error-message"><?= $errors['profile_picture'] ?? '' ?></span>
        </fieldset>

        <fieldset>
            <legend>Employee Information:</legend>

            <label for="f_name">Name:</label>
            <input type="text" id="f_name" name="f_name" class="input-field" placeholder="First Name" value="<?= $oldData['f_name'] ?? '' ?>">
            <span class="error-message"><?= $errors['f_name'] ?? '' ?></span>

            <label for="e_name">Email:</label>
            <input type="text" id="e_name" name="e_name" class="input-field" placeholder="Email" value="<?= $oldData['e_name'] ?? '' ?>">
            <span class="error-message"><?= $errors['e_name'] ?? '' ?></span>

            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" class="input-field" placeholder="Phone Number" value="<?= $oldData['phoneNumber'] ?? '' ?>">
            <span class="error-message"><?= $errors['phoneNumber'] ?? '' ?></span>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="input-field" placeholder="Address" value="<?= $oldData['address'] ?? '' ?>">
            <span class="error-message"><?= $errors['address'] ?? '' ?></span>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" class="input-field" value="<?= $oldData['dob'] ?? '' ?>">
            <span class="error-message"><?= $errors['dob'] ?? '' ?></span>

            <label>Gender:</label>
            <input type="radio" id="gender-male" name="gender" value="Male" <?= isset($oldData['gender']) && $oldData['gender'] == "Male" ? 'checked' : '' ?>> Male
            <input type="radio" id="gender-female" name="gender" value="Female" <?= isset($oldData['gender']) && $oldData['gender'] == "Female" ? 'checked' : '' ?>> Female
            <span class="error-message"><?= $errors['gender'] ?? '' ?></span><br><br>

            <label for="nid">NID Number:</label>
            <input type="text" id="nid" name="nid" class="input-field" placeholder="Enter NID Number" value="<?= $oldData['nid'] ?? '' ?>">
            <span class="error-message"><?= $errors['nid'] ?? '' ?></span>

            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" class="input-field" placeholder="Enter User ID" value="<?= $oldData['userid'] ?? '' ?>">
            <span class="error-message"><?= $errors['userid'] ?? '' ?></span>

            <label for="emprole">Employee Role:</label>
            <select name="emprole" id="emprole" class="input-field">
                <option value="">Select Employee Role</option>
                <option value="Manager" <?= isset($oldData['emprole']) && $oldData['emprole'] == "Manager" ? 'selected' : '' ?>>Manager</option>
                <option value="Developer" <?= isset($oldData['emprole']) && $oldData['emprole'] == "Developer" ? 'selected' : '' ?>>Developer</option>
                <option value="HR" <?= isset($oldData['emprole']) && $oldData['emprole'] == "HR" ? 'selected' : '' ?>>HR</option>
                <option value="Accountant" <?= isset($oldData['emprole']) && $oldData['emprole'] == "Accountant" ? 'selected' : '' ?>>Accountant</option>
            </select>
            <span class="error-message"><?= $errors['emprole'] ?? '' ?></span>
        </fieldset>

        <div>
            <button type="submit" name="submit">Submit</button>
            <button type="reset">Clear Form</button>
        </div>
    </form>
</body>

</html>
