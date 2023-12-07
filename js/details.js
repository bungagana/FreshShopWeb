// ... (your existing code) ...

function displayProducts() {
    const selectedCategory = document.getElementById('categorySelect').value.toLowerCase();
    const productsInCategory = products[selectedCategory];
    const productCategory = document.getElementById('Products');

    if (productsInCategory) {
        productCategory.innerHTML = productsInCategory
            .map(product => `
                <div class="Product" onclick="showProductDetails('${product.id}', '${product.name}', ${product.price})">
                    <img class="Image1" src="../images/${product.id}.jpg" alt="${product.name}">
                    <div class="Productdetail">
                        <div class="Name">${product.name}</div>
                        <div class="Price">RM ${product.price.toFixed(2)}</div>
                    </div>
                </div>
            `)
            .join('');
    }
}

function showProductDetails(productId, productName, productPrice) {
    const productDetailsContainer = document.getElementById('productDetailsContainer');
    const productDetailsImage = document.getElementById('productDetailsImage');
    const productDetailsName = document.getElementById('productDetailsName');
    const productDetailsPrice = document.getElementById('productDetailsPrice');

    productDetailsImage.src = `../images/${productId}.jpg`;
    productDetailsName.textContent = productName;
    productDetailsPrice.textContent = `RM ${productPrice.toFixed(2)}`;

    productDetailsContainer.style.display = 'block';
}

function closeProductDetails() {
    const productDetailsContainer = document.getElementById('productDetailsContainer');
    productDetailsContainer.style.display = 'none';
}

// ... (rest of your existing code) ...