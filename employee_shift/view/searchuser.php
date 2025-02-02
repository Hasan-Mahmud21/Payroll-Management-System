<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../ajax/script.js" defer></script> <!-- Load external JS file -->
</head>
<body>
    <h1>Search Users</h1>
    
    <!-- Search Input -->
    <input type="number" id="search" placeholder="Enter  ID" >
    
    <!-- Table to Display Search Results -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>UserID</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Shift Time</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <!-- Results will be displayed here -->
        </tbody>
    </table>

</body>
</html>
