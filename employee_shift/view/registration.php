<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/myjs.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Form</title>
    
</head>
<body>

    


    <div class="form-container">
        <h2>Shift Form</h2>
        <form id="shiftForm" method="post" action="../control/registration_control.php" enctype="multipart/form-data">
        
        <form>
            <!--<div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" placeholder="Enter ID">
            </div> -->
            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="text" id="userid" name="userid" placeholder="Enter User ID">
            </div>
            <div class="form-group">
                <label for="fromDate">From Date</label>
                <input type="date" id="fromDate" name="fromDate">
            </div>
            <div class="form-group">
                <label for="toDate">To Date</label>
                <input type="date" id="toDate" name="toDate">
            </div>
            <div class="form-group">
                <label for="startTime">Start Time</label>
                <input type="time" id="startTime" name="startTime">
            </div>
            <div class="form-group">
                <label for="endTime">End Time</label>
                <input type="time" id="endTime" name="endTime">
            </div>
            <div class="form-group">
                <label for="shiftTime">Shift Time</label>
                <input type="num" id="shiftTime" name="shiftTime" placeholder="Enter Shift Time">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Clear Form</button>
                <button onclick="demoFunction('print')">Click</button>
                <a href="showuser.php" class="button-link">User List</a>
            </div>
        </form>
    </div>
</body>
</html>
