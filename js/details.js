document.addEventListener('DOMContentLoaded', function() {
    const productId = getProductIdFromURL();
    const product = getProductById(productId);
    displayProductDetails(product);
});

function getProductById(productId) {
    for (const category in products) {
        const product = products[category].find(p => p.id === productId);
        if (product) {
            return product;
        }
    }
    return null;
}

function getProductIdFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id');
}

function displayProductDetails(product) {
    const productDetailContainer = document.getElementById('ProductDetail');
    const productImage = document.getElementById('productImage');
    const productName = document.getElementById('productName');
    const productPrice = document.getElementById('productPrice');
    const productDescription = document.getElementById('productDescription');
    const quantityInput = document.getElementById('quantity');

    if (product) {
        productImage.src = `../images/${product.id}.jpg`;
        productName.textContent = product.name;
        productPrice.textContent = `Price: RM ${product.price.toFixed(2)}`;
        productDescription.textContent = `Description: ${product.description || 'No description available.'}`;

        quantityInput.addEventListener('change', function() {
            updateTotalPrice(product, parseInt(quantityInput.value));
        });
    } else {
        productDetailContainer.innerHTML = '<p>Product not found.</p>';
    }

    const addToCartButton = document.querySelector('.add-to-cart-button');
    const removeButton = document.querySelector('.remove-button');
    const buyButton = document.querySelector('.order-button');

    addToCartButton.addEventListener('click', function() {
        const quantity = parseInt(quantityInput.value);
        addToCart(product, quantity);
    });

    removeButton.addEventListener('click', function() {
        removeFromCart(product.id);
    });

    buyButton.addEventListener('click', function() {
        const quantity = parseInt(quantityInput.value);

        if (isNaN(quantity) || quantity <= 0) {
            alert('Please enter a valid quantity.');
            return;
        }

        const totalPrice = product.price * quantity;
        const discount = calculateDiscount(totalPrice, quantity);
        const shippingFee = calculateShippingFee(totalPrice);
        const finalTotal = totalPrice - discount + shippingFee;

        const totalPaymentDetails = {
            totalPrice: formatCurrency(totalPrice),
            discount: formatCurrency(discount),
            shippingFee: formatCurrency(shippingFee),
            finalTotal: formatCurrency(finalTotal),
        };
        localStorage.setItem('totalPaymentDetails', JSON.stringify(totalPaymentDetails));

        const cartItem = {
            id: product.id,
            name: product.name,
            price: product.price,
            quantity: quantity,
        };
        localStorage.setItem('cartItems', JSON.stringify([cartItem]));

        window.location.href = '../php/payment.php';
    });
}

function addToCart(product, quantity) {
    // Retrieve existing cart items from local storage
    const existingCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Check if the product is already in the cart
    const existingCartItem = existingCartItems.find(item => item.id === product.id);

    if (existingCartItem) {
        // If the product is already in the cart, update the quantity
        existingCartItem.quantity += quantity;
    } else {
        // If the product is not in the cart, add it with the specified quantity
        const cartItem = {
            id: product.id,
            name: product.name,
            price: product.price,
            quantity: quantity,
        };
        existingCartItems.push(cartItem);
    }

    // Save the updated cart items back to local storage
    localStorage.setItem('cartItems', JSON.stringify(existingCartItems));

    alert('Product added to cart!');
}

function removeFromCart(productId) {
    // Retrieve existing cart items from local storage
    const existingCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Remove the product from the cart by filtering out the matching ID
    const updatedCartItems = existingCartItems.filter(item => item.id !== productId);

    // Save the updated cart items back to local storage
    localStorage.setItem('cartItems', JSON.stringify(updatedCartItems));

    alert('Product removed from cart!');
}

function updateTotalPrice(product, quantity) {
    const total = product.price * quantity;
    console.log(`Total Price for ${quantity} items: RM ${total.toFixed(2)}`);
}