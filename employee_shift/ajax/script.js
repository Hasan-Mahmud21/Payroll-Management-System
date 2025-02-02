$(document).ready(function () {
    // When user types in the search box
    $("#search").keyup(function () {
        let searchQuery = $(this).val(); // Get input value
        
        if (searchQuery !== "") {
            $.ajax({
                type: "POST",
                url: "../control/searchuser_control.php",
                data: { query: searchQuery },
                success: function (response) {
                    $("#userTable").html(response);
                },
                error: function () {
                    $("#userTable").html("<tr><td colspan='7' style='color:red;'>Error fetching data.</td></tr>");
                }
            });
        } else {
            $("#userTable").html(""); // Clear table when input is empty
        }
    });
});
