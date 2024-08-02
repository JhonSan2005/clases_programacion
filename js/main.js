// Función para actualizar el total del carrito
function updateCartTotal() {
    let total = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.querySelector('.cart-item-price').textContent.replace('$', ''));
        const quantity = parseInt(item.querySelector('.cart-item-quantity').textContent);
        total += price * quantity;
    });
    document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
}

// Función para añadir productos al carrito
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
        const productCard = button.closest('.card');
        const productName = productCard.querySelector('h5').textContent;
        const productPrice = "15.00"; // Cambia esto con el precio correcto del producto
        const cartItems = document.getElementById('cart-items');

        // Buscar si el producto ya está en el carrito
        let cartItem = Array.from(cartItems.children).find(item => item.querySelector('.cart-item-name').textContent === productName);

        if (cartItem) {
            // Incrementar la cantidad del producto si ya está en el carrito
            const quantityElement = cartItem.querySelector('.cart-item-quantity');
            quantityElement.textContent = parseInt(quantityElement.textContent) + 1;
        } else {
            // Añadir nuevo producto al carrito
            cartItem = document.createElement('li');
            cartItem.className = 'list-group-item d-flex justify-content-between align-items-center cart-item';
            cartItem.innerHTML = `
                <span class="cart-item-name">${productName}</span>
                <span>
                    <button class="btn btn-sm btn-secondary decrease-quantity">-</button>
                    <span class="cart-item-quantity">1</span>
                    <button class="btn btn-sm btn-secondary increase-quantity">+</button>
                    x <span class="cart-item-price">$${productPrice}</span>
                </span>
                <button class="btn btn-danger btn-sm remove-item">Eliminar</button>
            `;
            cartItem.querySelector('.remove-item').addEventListener('click', () => {
                cartItem.remove();
                updateCartTotal();
            });
            cartItem.querySelector('.decrease-quantity').addEventListener('click', () => {
                const quantityElement = cartItem.querySelector('.cart-item-quantity');
                const quantity = parseInt(quantityElement.textContent);
                if (quantity > 1) {
                    quantityElement.textContent = quantity - 1;
                } else {
                    cartItem.remove();
                }
                updateCartTotal();
            });
            cartItem.querySelector('.increase-quantity').addEventListener('click', () => {
                const quantityElement = cartItem.querySelector('.cart-item-quantity');
                quantityElement.textContent = parseInt(quantityElement.textContent) + 1;
                updateCartTotal();
            });
            cartItems.appendChild(cartItem);
        }
        updateCartTotal();
    });
});

// Función para finalizar la compra
document.getElementById('checkout-btn').addEventListener('click', () => {
    alert('Gracias por tu compra!');
    document.getElementById('cart-items').innerHTML = '';
    updateCartTotal();
});
