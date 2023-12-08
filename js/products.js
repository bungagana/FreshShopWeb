//=========== SELECT CONTEN CATEGORIES (ARRAY) ==========================
const products = {
    Fruits: [{
            id: 'Orange',
            name: 'Orange',
            price: 4.49,
            description: 'Sweet and juicy orange. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        },
        {
            id: 'Guava',
            name: 'Guava Jav',
            price: 5.99,
            description: 'Tropical guava from Java. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        },
        {
            id: 'Strawberry',
            name: 'Korean Strawberry',
            price: 20.07,
            description: 'Fresh strawberries from Korea. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        },
        {
            id: 'Berry',
            name: 'Import Berry',
            price: 18.99,
            description: 'Assorted imported berries. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
    ],
    Vegetables: [{
            id: 'Soup',
            name: 'Soup Vegetables',
            price: 5.99,
            description: 'Fresh vegetables for soup. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        },
        {
            id: 'Carrot',
            name: 'Organic Carrot',
            price: 5.80,
            description: 'Organically grown carrots. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        },
        {
            id: 'Cucumbar',
            name: 'Cucumbar',
            price: 4.60,
            description: 'Crisp and fresh cucumbers. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        },
        {
            id: 'BellPeppers',
            name: 'Bell Peppers',
            price: 6.10,
            description: 'Colorful bell peppers. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
    ],
    'Meat-Fish': [{
            id: 'Flesh',
            name: 'Flesh Meat',
            price: 40.87,
            description: 'High-quality flesh meat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        },
        {
            id: 'Sausage',
            name: 'Sausage',
            price: 13.78,
            description: 'Delicious sausages. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        },
        {
            id: 'Salmon',
            name: 'Salmon Fish',
            price: 40.60,
            description: 'Premium salmon fish. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        },
        {
            id: 'Meat',
            name: 'Meat Var 2',
            price: 38.78,
            description: 'Variety of meat products. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
    ],
    Snacks: [{
            id: 'Maca',
            name: 'Pink Macaron',
            price: 6.99,
            description: 'Sweet pink macarons. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        },
        {
            id: 'Popcorn',
            name: 'White Popcorn',
            price: 6.80,
            description: 'Classic white popcorn. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        },
        {
            id: 'Gummy',
            name: 'Gummy Bear',
            price: 4.22,
            description: 'Colorful gummy bears. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        },
        {
            id: 'Candy',
            name: 'Marble Candy',
            price: 6.10,
            description: 'Marble-patterned candies. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
    ],
    Beverages: [{
            id: 'Canna',
            name: 'Cannabis Infused',
            price: 6.99,
            description: 'Cannabis-infused beverages. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        },
        {
            id: 'Drink',
            name: 'Bottle Drink',
            price: 4.58,
            description: 'Bottled drinks for refreshment. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        },
        {
            id: 'Mac',
            name: 'Mac Cafe Coffee',
            price: 5.80,
            description: 'Coffee from Mac Cafe. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        },
        {
            id: 'Starbucks',
            name: 'Starbucks Coffee',
            price: 8.99,
            description: 'Premium Starbucks coffee. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
    ],
};

//=========== deklrasi elemen dr id html =============
const categorySelect = document.getElementById('categorySelect');
const productCategory = document.getElementById('Products');
const cartItems = document.getElementById('cartItems');
const cart = [];


//======= Like set on click listener in mobile ============
categorySelect.addEventListener('change', displayProducts);
productCategory.addEventListener('click', addToCart);
//============ DISPLAY FUNCTION ====================
function displayProducts() {
    const selectedCategory = categorySelect.value;
    const productsInCategory = products[selectedCategory];

    if (productsInCategory) {
        productCategory.innerHTML = productsInCategory
            .map(
                (product) => `
            <div class="Product">
                <img class="Image1" src="../images/${product.id}.jpg" alt="${product.name}">
                <div class="Productdetail">
                    <div class="Name">
                        <a href="details.php?id=${product.id}">${product.name}</a>
                    </div>
                    <div class="Price">RM ${product.price}</div>
                    <button data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" class="AddToCart">Add to Cart</button>
                </div>
            </div>
        `
            )
            .join('');

        // Add click event listeners to product names
        const productNames = document.querySelectorAll('.Name a');
        productNames.forEach(name => {
            name.addEventListener('click', viewProductDetail);
        });
    }
}

function getProductIdFromURL() {
    // Extract the product ID from the URL
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id');
}

function viewProductDetail(e) {
    e.preventDefault();
    const productId = e.target.getAttribute('href').split('=')[1];
    window.location.href = `../php/details.php?id=${productId}`;
}

function addToCart(e) {
    if (e.target.classList.contains('AddToCart')) {
        const id = e.target.getAttribute('data-id');
        const name = e.target.getAttribute('data-name');
        const price = parseFloat(e.target.getAttribute('data-price'));
        const item = { id, name, price, quantity: 1 };

        //=========== check jumlah product, dia using find method ==========
        //====== and dia update quantity products ========
        const existingItem = cart.find((cartItem) => cartItem.id === id);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push(item);
        }
        renderCart();
    }
}

//======= Calculate the discount based on the number of products ==========
function calculateDiscount(totalPrice, numProducts) {
    if (numProducts >= 5 && numProducts <= 10) {
        return totalPrice * 0.05;
    } else if (numProducts > 10) {
        return totalPrice * 0.15;
    }
    return 0;
}

//======= Calculate the shipping fee based on the total price =========
function calculateShippingFee(totalPrice) {
    if (totalPrice > 100.00) {
        return 0;
    } else {
        return 10.00;
    }
}

//===== Format currency for display =======
function formatCurrency(amount) {
    // return `Rp ${amount}`; //dia untuk rupiah and full not there number blkg koma
    return `RM ${amount.toFixed(2)}`; //dia untuk show angka 2 belakang koma
}

//=========== FUN TO UPDATE CART SHOPPING ==================
function renderCart() {
    cartItems.innerHTML = cart
        .map((item) => `<li>${item.name} - Rm ${item.price} x ${item.quantity} = Rm ${item.price * item.quantity}</li>`)
        .join('');

    // ------- using reduce untuk menjumlahkan semua harga --------
    const numProducts = cart.reduce((num, item) => num + item.quantity, 0);
    const totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);
    const discount = calculateDiscount(totalPrice, numProducts);
    const shippingFee = calculateShippingFee(totalPrice);
    const finalTotal = totalPrice - discount + shippingFee;
    //------- to get elemen id by format currency Rm
    document.getElementById('totalPrice').textContent = formatCurrency(totalPrice);
    document.getElementById('discount').textContent = formatCurrency(discount);
    document.getElementById('shippingFee').textContent = formatCurrency(shippingFee);
    document.getElementById('finalTotal').textContent = formatCurrency(finalTotal);
}

//========== CALL FUN DISPLAY ============
displayProducts();

//=============== BUY BUTTON SECTION ====================
const buyButton = document.getElementById('buyButton');
buyButton.addEventListener('click', buyItems);

//======= FUN BUYITEMS =========
// --- for send data to payment.html ----
function buyItems() {
    if (cart.length === 0) {
        showDialog("No products", "Your shopping cart is empty. Add products to cart before making a purchase.");
    } else {
        //------- Calculate payment details and proceed to the payment page -------
        const numProducts = cart.reduce((num, item) => num + item.quantity, 0);
        const cartItems = cart.map((item) => `${item.name} - Rm ${item.price} x ${item.quantity}`);
        const totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);
        const discount = calculateDiscount(totalPrice, numProducts);
        const shippingFee = calculateShippingFee(totalPrice);
        const finalTotal = totalPrice - discount + shippingFee;

        //------- Save payment details to local storage ------
        const totalPaymentDetails = {
            totalPrice: formatCurrency(totalPrice),
            discount: formatCurrency(discount),
            shippingFee: formatCurrency(shippingFee),
            finalTotal: formatCurrency(finalTotal),
        };
        localStorage.setItem('totalPaymentDetails', JSON.stringify(totalPaymentDetails));

        //------- Save cart items to local storage ---------
        localStorage.setItem('cartItems', JSON.stringify(cart));

        //------ Redirect to the payment page ----------
        window.location.href = '../php/payment.php';
    }

    function showDialog(title, message) {
        const result = confirm(title + "\n" + message);
    }
}
//=========== SEARCH FUNCTION ====================
// Function to handle form submission and search products
function searchProducts(event) {
    event.preventDefault(); // Prevent form submission

    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const selectedCategory = categorySelect.value.toLowerCase();
    const productsInCategory = products[selectedCategory];

    if (productsInCategory) {
        const filteredProducts = productsInCategory.filter(product =>
            product.name.toLowerCase().includes(searchInput)
        );

        displayFilteredProducts(filteredProducts);
    }
}

// Function to display filtered products
function displayFilteredProductss(filteredProducts) {
    const productCategory = document.getElementById('Products');

    if (filteredProducts.length > 0) {
        productCategory.innerHTML = filteredProducts
            .map(product => `
                <div class="Product">
                    <img class="Image1" src="../images/${product.id}.jpg" alt="${product.name}">
                    <div class="Productdetail">
                        <div class="Name">${product.name}</div>
                        <div class="Price">RM ${product.price.toFixed(2)}</div>
                        <button data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" class="AddToCart">Add to Cart</button>
                    </div>
                </div>
            `)
            .join('');
    } else {
        productCategory.innerHTML = '<p>No matching products found.</p>';
    }
}


// Initial display of products
const initialCategory = document.getElementById('categorySelect').value.toLowerCase();
displayProducts(initialCategory);