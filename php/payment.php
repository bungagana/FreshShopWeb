<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/payment.css">
    <!-- Sertakan stylesheet sesuai kebutuhan Anda -->
    <title>Payment</title>
</head>

<body>
    <!-------------------- PAYMENT DETAILS SECTION -------------------->
    <div class="PaymentContainer">
        <h2>Products</h2>
        <ul id="cartContents">
            <!-- Product list in cart -->
        </ul>
        <h2>Payment Details</h2>
        <div class="OrderSummary">
            <div class="ProductDetails">
                <ul id="cartItems">
                    <!-- Selected items will be displayed here -->
                </ul>
            </div>
            <div class="TotalPrice">
                <h4>Total Items Price:</h4>
                <span id="totalPrice">0</span>
            </div>
            <div class="Discount">
                <h4>Discount:</h4>
                <span id="discount">0</span>
            </div>
            <div class="ShippingFee">
                <h4>Shipping Fee:</h4>
                <span id="shippingFee">0</span>
            </div>
            <hr>
            <div class="FinalTotal">
                <h4>Payments Total:</h4>
                <span id="finalTotal">0</span>
            </div>
        </div>
        <button id="buyButton">Buy</button>
    </div>

    <!-------------------- JS SECTION -------------------->
    <script>
        // -------- get data from localstorage by id -------
        const cartItems = JSON.parse(localStorage.getItem('cartItems'));

        if (cartItems && cartItems.length > 0) {
            const cartContents = document.getElementById('cartContents');
            cartItems.forEach((item) => {
                const listItem = document.createElement('li');
                //------- showing item products ---------
                listItem.textContent = `${item.name} - Rp ${item.price} x ${item.quantity}`;
                cartContents.appendChild(listItem);
            });
        }
        // -------- get payment details from localstorage by id  and this is from JS in products page-------
        const totalPaymentDetails = JSON.parse(localStorage.getItem('totalPaymentDetails'));
        if (totalPaymentDetails) {
            document.getElementById('totalPrice').textContent = totalPaymentDetails.totalPrice;
            document.getElementById('discount').textContent = totalPaymentDetails.discount;
            document.getElementById('shippingFee').textContent = totalPaymentDetails.shippingFee;
            document.getElementById('finalTotal').textContent = totalPaymentDetails.finalTotal;
        }
        const buyButton = document.getElementById('buyButton');
        buyButton.addEventListener('click', buyItems);

        function showDialog(title, message) {
            const result = confirm(title + "\n" + message);
            if (result) {
                window.location.href = "home.html";
            }
        }

        function buyItems() {
            showDialog("Your Purchase is Accepted! ", "Order will be shipped immediately and prepare your money");
        }
    </script>
</body>

</html>