<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #8e44ad;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            border-bottom: 2px solid #f8bbd0;
            padding-bottom: 10px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            background:rgb(241, 107, 154);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f8bbd0;
        }
        th {
            background: purple;
            color: white;
            font-weight: 500;
        }
        tr:nth-child(even) {
            background-color: #fce4ec;
        }
        tr:hover {
            background-color: #f8bbd0;
            transition: background-color 0.3s ease;
        }
        #demo {
            margin-top: 20px;
        }
        .no-data {
            text-align: center;
            padding: 30px;
            color: #9c27b0;
            font-style: italic;
        }
        .timestamp {
            text-align: right;
            font-size: 12px;
            color: #9c27b0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <div class="header">
            <h3>User Management</h3>
            <button class="btn" onclick="loadDoc()">Refresh User List</button>
        </div>
        <div id="demo">
            <p class="no-data">Click the button above to load user data</p>
        </div>
        <p class="timestamp">Last updated: <span id="lastUpdated">Never</span></p>
    </div>
    
    <script>
        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                try {
                    console.log("Raw response: ", this.responseText);
                    const userData = JSON.parse(this.responseText)
                    console.log("Parsed userData: ", userData)
                    
                    let tableHTML =  '<table>';
                    tableHTML += '<tr><th>Username</th><th>Password</th><th>Date</th></tr>';

                    userData.forEach(user => {
                        tableHTML += `<tr>
                            <td>${user.username}</td>
                            <td>${user.password}</td>
                            <td>${user.date}</td>
                        </tr>`;
                    });
                    tableHTML += '<table>';

                    document.getElementById("demo").innerHTML = tableHTML;
                    document.getElementById("lastUpdated").textContent = new Date().toLocaleTimeString();
                
                } catch (e) {
                    console.error('Error', e);
                    document.getElementById("demo").innerHTML = '<p class="no-data">No user data available</p>';
                }
            }
                xhttp.open("GET", "output/users.json", true);
                xhttp.send();
            }
    </script>
</body>
</html>
