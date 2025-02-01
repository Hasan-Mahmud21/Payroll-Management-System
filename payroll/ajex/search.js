document.getElementById('searchButton').addEventListener('click', function () {
    const searchQuery = document.getElementById('searchBar').value;

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector('tbody').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", `../control/searchcontrol.php?searchQuery=${searchQuery}`, true);
    xhttp.send();
});

document.getElementById('searchBar').addEventListener('keyup', function (e) {
    const searchQuery = e.target.value;

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector('tbody').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", `../control/searchcontrol.php?searchQuery=${searchQuery}`, true);
    xhttp.send();
});