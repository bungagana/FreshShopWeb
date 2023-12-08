document.addEventListener('DOMContentLoaded', function() {
    displayCartItems();
});

function displayCartItems() {
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    if (cartItems.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        return;
    }

    cartItemsContainer.innerHTML = '<h4>Cart Items</h4>';

    cartItems.forEach(item => {
        const itemContainer = document.createElement('div');
        itemContainer.classList.add('cart-item');

        const itemName = document.createElement('p');
        itemName.textContent = `Name: ${item.name}`;

        const itemPrice = document.createElement('p');
        itemPrice.textContent = `Price: RM ${item.price.toFixed(2)}`;

        const itemQuantity = document.createElement('input');
        itemQuantity.type = 'number';
        itemQuantity.min = '1';
        itemQuantity.value = item.quantity;
        itemQuantity.addEventListener('input', function() {
            updateQuantity(item.id, parseInt(itemQuantity.value));
        });

        itemContainer.appendChild(itemName);
        itemContainer.appendChild(itemPrice);
        itemContainer.appendChild(itemQuantity);

        cartItemsContainer.appendChild(itemContainer);
    });

    // Display checkboxes for each product in the checkout form
    const checkoutForm = document.getElementById('checkoutForm');
    cartItems.forEach(item => {
        const checkboxDiv = document.createElement('div');
        const checkboxInput = document.createElement('input');
        checkboxInput.type = 'checkbox';
        checkboxInput.name = 'selectedProduct';
        checkboxInput.value = item.id;

        const checkboxLabel = document.createElement('label');
        checkboxLabel.textContent = `${item.name} (Price: RM ${item.price.toFixed(2)})`;

        checkboxDiv.appendChild(checkboxInput);
        checkboxDiv.appendChild(checkboxLabel);
        checkoutForm.appendChild(checkboxDiv);
    });

    // Display total payment details
    updateTotalPaymentDetails();
}

function updateQuantity(productId, newQuantity) {
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const updatedCartItems = cartItems.map(item => {
        if (item.id === productId) {
            // Update the quantity
            item.quantity = newQuantity;
            // Update the total price for the item
            item.totalPrice = item.price * newQuantity;
        }
        return item;
    });
    localStorage.setItem('cartItems', JSON.stringify(updatedCartItems));
    displayCartItems();
}

function updateTotalPaymentDetails() {
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const totalPaymentDetailsContainer = document.getElementById('totalPaymentDetails');

    const totalQuantity = cartItems.reduce((total, item) => total + item.quantity, 0);
    const totalPrice = cartItems.reduce((total, item) => total + item.totalPrice, 0);

    totalPaymentDetailsContainer.innerHTML = `<p>Total Quantity: ${totalQuantity}</p>
                                             <p>Total Price: RM ${totalPrice.toFixed(2)}</p>`;

    const checkoutButton = document.getElementById('checkoutButton');
    checkoutButton.disabled = cartItems.length === 0;
}