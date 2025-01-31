
<?php
session_start();
if (!isset($_SESSION["f_name"])) {
    header("location:../view/employee.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../css/mystyle.css">
<script src="../js/myjs.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 id="print">WELCOME</h1>
    <form>
    <?php
    
        // Echo session variables that were set on previous page
         echo "User Name " . $_SESSION["f_name"] . ".<br><br>";
        //echo "Password " . $_SESSION["Password"] . "<br>";
    ?>
    <a href="showuser.php" class="button-update">Show List</a>
    <a href="../control/session_Logout.php" class="button-logout">Back</a><br><br>
</form>
</body>

</html>