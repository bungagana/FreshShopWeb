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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css"> 
    <title>Product Catalog</title>
</head>


<body>
    <!-------------------- START NAVBAR SECTION -------------------->
    <div class="Navbar">
        <div class="Logo">
            <img src="../images/logo.png" alt="Logo" width="120">
        </div>
        <ul>
            <li><a href="home.php" class="active">Home</a></li>
            <li><a href="produk.php">Catalog</a></li>
            <li><a href="#">My History</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <div class="ProfileInfo">
            <img src="../images/profile-icon.png" alt="Profile Icon" class="ProfileIcon" id="profileIcon">
            <span id="userName"><?php echo $userProfileName; ?></span>
            <!-- Container for Logout Options -->
            <div id="logoutOptions" class="LogoutOptions">
            <button id="logoutButton"><a href="index.php">Logout</a></button>

                <!-- <button id="loginButton">Login</button> -->

            </div>
        </div>
    </div>
    <!-------------------- END NAVBAR SECTION -------------------->

    <!-------------------- START LP SECTION -------------------->
    <div class="Content">
        <div class="ImageContainer">
            <img src="../images/Bannar Big.png" alt="Fresh & Healthy Organic Food">
        </div>
        <div class="ContentText">
            <div class="ContentHeading">Fresh & Healthy Organic Food</div>
            <div class="SaleInfo">
                Sale up to
                <span class="Discount">30% OFF</span>
            </div>
            <div class="FreeShipping">Free shipping on all your order.</div>
            <a href="#popular-categories" class="ShopNowButton">Shop Now</a>
        </div>
    </div>
    <!-------------------- END LP SECTION -------------------->


    <!-------------------- START FEATURED SECTION -------------------->
    <div class="Featured">
        <div class="Feature">
            <div class="DeliveryTruck1">
                <img src="../images/delivery-truck 1.png" alt="Delivery Truck Icon">
            </div>
            <div class="Info">
                <div class="FreeShipping">Free Shipping</div>
                <div class="FreeShippingOnAllYourOrder">Free shipping on all your order</div>
            </div>
        </div>
        <div class="Feature">
            <div class="Headphones1">
                <img src="../images/headphones 1.png" alt="Headphones Icon">
            </div>
            <div class="Info">
                <div class="CustomerSupport247">Customer Support 24/7</div>
                <div class="InstantAccessToSupport">Instant access to Support</div>
            </div>
        </div>
        <div class="Feature">
            <div class="ShoppingBag">
                <img src="../images/shopping-bag.png" alt="Shopping Bag Icon">
            </div>
            <div class="Info">
                <div class="SecurePayment">100% Secure Payment</div>
                <div class="WeEnsureYourMoneyIsSave">We ensure your money is safe</div>
            </div>
        </div>
        <div class="Feature">
            <div class="Package">
                <img src="../images/package.png" alt="Package Icon">
            </div>
            <div class="Info">
                <div class="MoneyBackGuarantee">Money-Back Guarantee</div>
                <div class="DaysMoneyBackGuarantee">30 Days Money-Back Guarantee</div>
            </div>
        </div>
    </div>
    <!-------------------- END FEATURED SECTION -------------------->

    <!-------------------- START POP CATEGORIES SECTION -------------------->
    <div class="SubHeader">Popular Categories</div>
    <div class="PopularCategories" id="popular-categories">

        <div class="Category">
            <a href="products.html">
                <img class="Image1" src="../images/image 1.png" alt="Category 1">
                <div class="CategoryName">Fresh Fruits</div>
            </a>
        </div>
        <div class="Category">
            <a href="products.html">
                <img class="Image1" src="../images/vege.png" alt="Category 1">
                <div class="CategoryName">Fresh Vegetables</div>
            </a>
        </div>
        <div class="Category">
            <a href="products.html">
                <img class="Image1" src="../images/meat.png" alt="Category 1">
                <div class="CategoryName">Meat/Fish</div>
            </a>
        </div>
        <div class="Category">
            <a href="products.html">
                <img class="Image1" src="../images/snack.png" alt="Category 1">
                <div class="CategoryName">Snacks</div>
            </a>
        </div>
        <div class="Category">
            <a href="products.html">
                <img class="Image1" src="../images/Beauty.png" alt="Category 1">
                <div class="CategoryName">Beauty & Health</div>
            </a>
        </div>
        <div class="Category">
            <a href="products.html">
                <img class="Image1" src="../images/Beauty.png" alt="Category 1">
                <div class="CategoryName">Beauty & Health</div>
            </a>
        </div>
    </div>
    <!-------------------- END POP CATEGORIES SECTION -------------------->

    <!-------------------- START ARTICLE SECTION -------------------->
    <div class="Article">
        <div class="ArticleContent">
            <div class="ArticleImage">
                <img src="../images/Article.png" alt="Article Image">
            </div>
            <div class="ArticleText">
                <h2>100% Trusted Organic Food Store</h2>
                <p>Small-batch sourcing ensures that the ingredients are handpicked, processed with precision, and closely monitored for consistency. It embodies the essence of artisanal production, where attention to detail and authenticity take precedence
                    over mass production. This approach not only guarantees the purity and flavor of the final product but also contributes to sustainable and responsible sourcing practices, reflecting a commitment to both excellence and the environment.</p>
                <a href="https://www.greenseedorg.com/" class="ReadMoreButton">Read More</a>

            </div>
        </div>
    </div>
    <!-------------------- END ARTICLE SECTION -------------------->

    <!-------------------- START TESTI SECTION -------------------->
    <div class="TestimonialTitle">
        <h3 class="TestimonialTitle">Testimonials</h3>
    </div>
    <div class="Testimonials">
        <!-- Testimonial Cards -->
        <div class="TestimonialCard">
            <div class="Profile">
                <img src="../images/profile.png" alt="Profile Image">
            </div>
            <div class="Name">Jiddan</div>
            <div class="Comment">This is a great place to shop for organic food. I highly recommend it.</div>
            <div class="Rating">
                <!-- Rating Section -->
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star empty">&#9733;</span>
            </div>
        </div>
        <div class="TestimonialCard">
            <div class="Profile">
                <img src="../images/profile.png" alt="Profile Image">
            </div>
            <div class="Name">John</div>
            <div class="Comment">This is a great place to shop for organic food. I highly recommend it.</div>
            <div class="Rating">
                <!-- Rating Section -->
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
            </div>
        </div>
        <div class="TestimonialCard">
            <div class="Profile">
                <img src="../images/profile.png" alt="Profile Image">
            </div>
            <div class="Name">Biyan</div>
            <div class="Comment">This is a great place to shop for organic food. I highly recommend it.</div>
            <div class="Rating">

                <!-- Rating Section -->
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
                <span class="Star">&#9733;</span>
            </div>
        </div>
    </div>
    <!-------------------- END TESTI SECTION -------------------->

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

    <!-------------------- JS SECTION -------------------->
    <script src="./js/home.js"></script>

</body>



</html>
