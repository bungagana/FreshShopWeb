<?php
include 'db.php';

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST["loginUsername"];
    $loginPassword = $_POST["loginPassword"];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $loginUsername);
    $stmt->execute();
    $stmt->bind_result($userId, $dbUsername, $dbPassword);

 // Setelah verifikasi kata sandi yang berhasil
if ($stmt->fetch()) {
    if (password_verify($loginPassword, $dbPassword)) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $dbUsername; 
        header("Location: home.php");
        header("Location: produk.php");
        exit; 
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid username or password.";
}

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
    <div class="container">
        <h2>L O G I N</h2>
        <form method="post" action="index.php" id="loginForm">
            <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" required>
            <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="regis.php">Register</a></p>
        <p id="loginMessage"></p>
    </div>

    <script src="../js/login.js"></script>

</body>

</html>
