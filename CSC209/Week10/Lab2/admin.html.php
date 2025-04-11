<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .container {
            margin: 20px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Panel - User List</h2>
        <div id="demo"></div>
        <button onclick="loadDoc()">Load Users</button>
    </div>
    
    <script>
        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                const userData = this.responseText;
                const users = userData.split(':');
                
                if (users.length >= 2) {
                    const username = users[0];
                    const password = users[1];
                    
                    let tableHTML = '<table>';
                    tableHTML += '<tr><th>Username</th><th>Password</th></tr>';
                    tableHTML += '<tr><td>' + username + '</td><td>' + password + '</td></tr>';
                    tableHTML += '</table>';
                    
                    document.getElementById("demo").innerHTML = tableHTML;
                } else {
                    document.getElementById("demo").innerHTML = "No user data available";
                }
            }
            xhttp.open("GET", "./output/users.txt", true);
            xhttp.send();
        }
    </script>
</body>
</html>
