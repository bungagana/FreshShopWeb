<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/cart.css"> 
</head>

<body>
<div class="content-container">
        <div id="cartItemsContainer">
            <h3>Shopping Cart</h3>
            <!-- Cart items will be displayed here -->
        </div>
        
        <div id="checkoutContainer">
            <h4>Selected Products</h4>
            <form id="checkoutForm">
                <!-- Selected products will be displayed here -->
            </form>
            
            <div id="totalPaymentDetails"></div>
            <button id="checkoutButton" disabled>Checkout</button>
        </div>
    </div>

    <script src="../js/cart.js"></script>
</body>

</html>
