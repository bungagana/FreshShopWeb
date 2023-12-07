    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["fullName"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        if ($password !== $confirmpassword) {
            echo "Password and Confirm Password do not match.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $servername = "localhost";
            $dbUsername = "root"; 
            $password = "";
            $dbname = "websiteCatalog";

            $conn = new mysqli($servername, $dbUsername, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$hashedPassword')";
            if ($conn->query($sql) === TRUE) {
                echo "Congrats! Your account has been created.";
               
                header("Location: index.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>

<body>
    <div class="container">
        <h2>R E G I S T E R</h2>

        <form method="post" action="regis.php" id="registrationForm">
            <input type="text" id="name" name="fullName" placeholder="Full Name" required>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <p>Already Have Account? <a href="index.php">Login</a></p>
        <p id="registrationMessage"></p>
    </div>

    <script src="../js/regis.js"></script>
</body>

</html>