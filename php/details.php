<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <style>
        /* Add some styling for the product details */
        .ProductDetailsContainer {
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .ProductDetailsContainer img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .ProductDetailsContainer .ProductName {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .ProductDetailsContainer .ProductPrice {
            font-size: 16px;
            color: #00B207;
            margin-bottom: 20px;
        }

        .ProductDetailsContainer .CloseButton {
            cursor: pointer;
            background-color: #ddd;
            padding: 8px 16px;
            border-radius: 8px;
            display: inline-block;
        }
    </style>
</head>


<body>
    <!-- ... (your existing code) ... -->

    <div class="ProductDetailsContainer" id="productDetailsContainer">
        <!-- Product details will be displayed here -->
        <img id="productDetailsImage" alt="Product Image">
        <div class="ProductName" id="productDetailsName"></div>
        <div class="ProductPrice" id="productDetailsPrice"></div>
        <div class="CloseButton" onclick="closeProductDetails()">Close</div>
    </div>

    <!-- ... (your existing code) ... -->

    <script src="../js/products.js"></script>
</body>

</html>
