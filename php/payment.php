<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/payment.css">
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
             <!-------------------- PAYMENT METHOD SECTION -------------------->
             <div class="PaymentMethod">
            <h2>Payment Method</h2>
            <form id="paymentForm">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" required>

                <label for="expiryDate">Expiry Date:</label>
                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YYYY" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>
            </form>
        </div>
        <button id="buyButton">Pay</button>
    </div>

    <!-------------------- JS SECTION -------------------->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buyButton = document.getElementById('buyButton');
            buyButton.disabled = true; // Disable Pay button initially

            // Get cart items from local storage
            const cartItems = JSON.parse(localStorage.getItem('cartItems'));

            if (cartItems && cartItems.length > 0) {
                const cartContents = document.getElementById('cartContents');
                const cartItemsList = document.getElementById('cartItems');
                
                cartItems.forEach((item) => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${item.name} - Rp ${item.price} x ${item.quantity}`;
                    cartContents.appendChild(listItem);

                    // Add the selected items to the list
                    const itemDetail = document.createElement('li');
                    itemDetail.textContent = `${item.name} - Rp ${item.price} x ${item.quantity}`;
                    cartItemsList.appendChild(itemDetail);
                });
            }

            // Get total payment details from local storage
            const totalPaymentDetails = JSON.parse(localStorage.getItem('totalPaymentDetails'));
            if (totalPaymentDetails) {
                document.getElementById('totalPrice').textContent = totalPaymentDetails.totalPrice;
                document.getElementById('discount').textContent = totalPaymentDetails.discount;
                document.getElementById('shippingFee').textContent = totalPaymentDetails.shippingFee;
                document.getElementById('finalTotal').textContent = totalPaymentDetails.finalTotal;
            }

            const paymentForm = document.getElementById('paymentForm');

            paymentForm.addEventListener('input', function () {
                // Check if the payment form is valid
                const isPaymentFormValid = paymentForm.checkValidity();
                buyButton.disabled = !isPaymentFormValid;
            });

            buyButton.addEventListener('click', function () {
                if (paymentForm.checkValidity()) {
                    showDialog("Your Purchase is Accepted! ", "Order will be shipped immediately ");
                } else {
                    alert("Please fill in all required fields in the payment form.");
                }
            });

            function showDialog(title, message) {
                const result = confirm(title + "\n" + message);
                if (result) {
                    window.location.href = "home.php";
                }
            }
        });
    </script>
</body>

</html>