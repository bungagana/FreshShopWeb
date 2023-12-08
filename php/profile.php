<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
// Include your database connection
include 'db.php';

$userProfileName = "";
$userUsername = "";
$userEmail = "";

// Retrieve user information from the database
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $sql = "SELECT name, email, username FROM users WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userProfileName, $userEmail, $userUsername);
        $stmt->fetch();
    } else {
        // Handle error if user data cannot be retrieved
        echo "Error retrieving user data: " . $conn->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['saveProfile'])) {
    // Get user input
    $newName = $_POST["full_name"];
    $newEmail = $_POST["email"];
    $newPassword = $_POST["password"];

    // Validate and update data in the database
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        // Update the user information with the new password
        // Modify the SQL query accordingly based on your database structure
        $sql = "UPDATE users SET name=?, email=?, password=? WHERE id=?";
    } else {
        // Update the user information without changing the password
        // Modify the SQL query accordingly based on your database structure
        $sql = "UPDATE users SET name=?, email=? WHERE id=?";
    }

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        if (!empty($newPassword)) {
            $stmt->bind_param("sssi", $newName, $newEmail, $hashedPassword, $_SESSION['user_id']);
        } else {
            $stmt->bind_param("ssi", $newName, $newEmail, $_SESSION['user_id']);
        }

        // Execute the SQL query
        $result = $stmt->execute();

        if ($result) {
            // Update session variables with the new information
            $_SESSION['name'] = $newName;
            $_SESSION['email'] = $newEmail;
            // Redirect back to the profile page
            header("Location: profile.php");
            exit;
        } else {
            echo "Error updating profile: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>User Profile</title>
</head>

<body>
  <!-------------------- START NAVBAR SECTION -------------------->
  <div class="Navbar">
        <div class="Logo">
            <img src="../images/logo.png" alt="Logo" width="120">
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="produk.php">Catalog</a></li>
            <li><a href="#">My Booking</a></li>
            <li><a href="#">Saved</a></li>
            <li><a href="profile.php" class="active">Profile</a></li>
        </ul>
        <div class="ProfileInfo">
            <img src="../images/profile-icon.png" alt="Profile Icon" class="ProfileIcon" id="profileIcon">
            <span id="userName"><?php echo $userUsername; ?></span>
            <div id="logoutOptions" class="LogoutOptions">
            <button id="logoutButton"><a href="index.php">Logout</a></button>
            </div>
        </div>
    </div>
    <!-------------------- END NAVBAR SECTION -------------------->
     <!-- Display User Information -->
     <div class="user-info">
     <h2> User Information</h2>
            <p><strong>Full Name:</strong> <?php echo $userProfileName; ?></p>
            <p><strong>Username:</strong> <?php echo $userUsername; ?></p>
            <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
        </div>

  <!-- Edit Information Form -->
  <hr>
    <form id="editProfileForm" method="post" action="profile.php">
        <h2> Edit Information</h2>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $userProfileName; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userEmail; ?>">
        
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password">

        <button type="submit" name="saveProfile">Save Changes</button>
    </form>
    </div>
    <!-------------------- START FOOTER SECTION -------------------->
    <div class="Sponsor">
        <img src="../images/Company Logo.png" class="LogoImage">
    </div>
    <div class="Footer">
        <div class="FooterContent">
            <div class="FooterLogo">
                <img src="../images/Logo.png" alt="Footer Logo" width="100">
            </div>
            <div class="FooterLinks">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="produkcategory.html">Catalog</a></li>
                </ul>
            </div>
            <div class="SocialIcons">
                <a href="#"><img src="../images/facebook.png" alt="Facebook" width="30"></a>
                <a href="https://www.instagram.com/"><img src="../images/instagram.png" alt="Instagram" width="30"></a>
                <a href="#"><img src="../images/twitter.png" alt="Twitter" width="30"></a>
            </div>
        </div>
        <div class="CopyrightText">
            &copy; 2023 Bunga (JI230003). All rights reserved.
        </div>
    </div>
    <!-------------------- END FOOTER SECTION -------------------->
    <script src="../js/profile.js"></script>
</body>

</html>
