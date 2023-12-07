document.addEventListener('DOMContentLoaded', function() {
    // Read user data from storage
    const userData = JSON.parse(localStorage.getItem('registrationData'));

    // Get elements
    const userNameElement = document.getElementById('userName');
    const profileIcon = document.getElementById('profileIcon');
    const logoutOptions = document.getElementById('logoutOptions');
    const loginButton = document.getElementById('loginButton');
    const logoutButton = document.getElementById('logoutButton');

    // Check if the user is logged in
    if (userData && userData.name) {
        // User is logged in
        userNameElement.textContent = userData.username;

        // Add click event listener to profile icon
        profileIcon.addEventListener('click', function() {
            // Toggle the visibility of logout options
            logoutOptions.classList.toggle('show');
        });

        // Show logout button and hide login button
        if (logoutButton) {
            logoutButton.style.display = 'block';

            // Handle logout button click event
            logoutButton.addEventListener('click', function() {
                // Remove user data from localStorage
                localStorage.removeItem('registrationData');
                // Redirect to the login page
                window.location.href = 'index.php';
            });
        }
        if (loginButton) {
            loginButton.style.display = 'none';
        }
    }
});