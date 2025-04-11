// Get the modal
let modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// handles form submission via AJAX to send the username and password to the server
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();  // Stop normal form submission
    
    // Get the form data
    const username = document.getElementById('uname').value;
    const password = document.getElementById('psw').value;
    
    // Send to login.php
    fetch('php/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `uname=${username}&psw=${password}`
    })
    .then(response => response.json())
    .then(data => {
        console.log('Server response:', data);
        if (data.redirect) {
            window.location.href = data.redirect;
        } else {
            document.getElementById('responseMessage').textContent = data.message || 'Login successful';
        }
    })
    .catch(error => {
        console.error("Error:", error);
        document.getElementById('responseMessage').textContent = 'Error: Could not connect to server';
    });
});