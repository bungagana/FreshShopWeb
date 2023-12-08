<?php
// Mendapatkan ID, Nama, dan Harga Produk dari URL
$productId = isset($_GET['id']) ? $_GET['id'] : null;
$productName = isset($_GET['name']) ? $_GET['name'] : null;
$productPrice = isset($_GET['price']) ? $_GET['price'] : null;
$productDescription = isset($_GET['description']) ? $_GET['description'] : null;
// ... (lainnya detail produk)


// Menggunakan retrieved product details dalam HTML
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/details.css"> <!-- Add your product detail page styles -->
</head>

<body>
<div class="produk-detail" id="ProductDetail">
    <h3>Detail Produk</h3>
    <img src="../images/<?php echo $productId; ?>.jpg" alt="<?php echo $productName; ?>" id="productImage" class="product-image">
    <h4 class="product-name" id="productName"><?php echo $productName; ?></h4>
    <div class="product-info">
        <div>
            <p class="product-id" id="productId"><?php echo 'Product ID: ' . $productId; ?></p>
        </div>
        <div>
            <p class="product-price" id="productPrice"><?php echo 'Price: RM ' . $productPrice; ?></p>
            <div class="quantity">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
            </div>
        </div>
    </div>
    <hr>
    <p class="product-description" id="productDescription"><?php echo 'Description: ' . $productDescription; ?></p>
   <!-- Susun tombol "Add to Cart" dan "Buy" secara horizontal -->
   <div class="button-container">
            <button class="add-to-cart-button">Add to Cart</button>
            <button class="order-button">Buy</button>
        </div>
</div>


<script src="../js/products.js"></script>
<script src="../js/details.js"></script>
</body>

</html>