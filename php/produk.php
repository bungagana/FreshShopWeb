<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
$userProfileName = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/navbar.css"> 
</head>

<body>
    <!---------------------- START NAVBAR SECTION -------------------------->
    <div class="Navbar">
        <div class="Logo">
            <img src="../images/Logo.png" alt="Logo" width="120">
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="produkcategory.html" class="active">Catalog</a></li>
            <li><a href="#">My Booking</a></li>
            <li><a href="#">Saved</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <div class="ProfileInfo">
            <img src="../images/profile-icon.png" alt="Profile Icon" class="ProfileIcon" id="profileIcon">
            <span id="userName"><?php echo $userProfileName; ?></span>
            <!-- Container for Logout Options -->
            <div id="logoutOptions" class="LogoutOptions">
                <button id="logoutButton"><a href="index.php">Logout</a></button>
            </div>
        </div>
    </div>
    <!---------------------- END NAVBAR SECTION -------------------------->

    <!---------------------- START PRODUCT CATEGORIES SECTION -------------------------->
    <div class="Content">
        <div class="SearchBar">
            <form onsubmit="return searchProducts(event)">
            <input type="text" id="searchInput" placeholder="Search...">
            <button type="submit">Search</button>
            </form>

        </div>

        <h4 class="SubFilter">Product Categories</h4>
        <div class="CategoryFilter">
            <select id="categorySelect">
                <option value="Fruits">Fresh Fruits</option>
                <option value="Vegetables">Fresh Vegetables</option>
                <option value="Meat-Fish">Meat/Fish</option>
                <option value="Snacks">Snacks</option>
                <option value="Beverages">Beverages</option>
            </select>
        </div>
        <h4 class="SubProduct">Product Categories</h4>
        <div class="ProductCategory" id="Products">
            <!-- automatically display, generate product cart from js -->
        </div>
        <hr>

        <h4 class="SubHeadCart">Shopping Cart</h4>
        <div class="ShoppingCart">
            <ul id="cartItems">
                <!-- Selected items will be displayed here -->
            </ul>
            <div class="TotalPrice">
                Total: <span id="totalPrice">0</span>
            </div>
            <button id="buyButton">Buy</button>
        </div>
    </div>

    <!---------------------- START JS SECTION -------------------------->
    <script src="../js/products.js"></script>
    <!---------------------- END NAVBAR SECTION -------------------------->
</body>

</html>