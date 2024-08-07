<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Agrega este enlace a FontAwesome en tu <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Repuestos JJ | <?php echo $title ?? ''; ?></title>
</head>

<body>

    <?php include_once __DIR__ . '../includes/header.php'; ?>


    <main class="container main-content">
        <?php echo $contenido; ?>
    </main>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Carrito de Compras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul id="cart-items" class="list-group mb-3"></ul>
        <div id="cart-total">Total: $0.00</div>
        <a href="/carrito" class="btn btn-success w-100" id="checkout-btn">Ir al Carrito</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/js/carrito.js"></script>

<script>
    // JavaScript aquí

    function addToCart(product) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingProductIndex = cart.findIndex(item => item.id === product.id);
        
        if (existingProductIndex > -1) {
            cart[existingProductIndex].quantity += product.quantity;
        } else {
            cart.push(product);
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function loadCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsContainer = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        
        cartItemsContainer.innerHTML = '';

        let total = 0;
        
        cart.forEach(product => {
            const item = document.createElement('li');
            item.className = 'list-group-item d-flex justify-content-between';
            item.innerHTML = `
                <span>${product.name} (x${product.quantity})</span>
                <strong>$${product.price * product.quantity}</strong>
            `;
            
            cartItemsContainer.appendChild(item);
            total += product.price * product.quantity;
        });
        
        cartTotal.innerText = `Total: $${total.toFixed(2)}`;
    }

    function updateQuantity(productId, newQuantity) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const productIndex = cart.findIndex(item => item.id === productId);
        
        if (productIndex > -1) {
            if (newQuantity <= 0) {
                cart.splice(productIndex, 1);
            } else {
                cart[productIndex].quantity = newQuantity;
            }
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart();
    }

    function deleteProduct(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.id !== productId);
        
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart();
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadCart();
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

    <?php include_once __DIR__ . '../includes/footer.php'; ?>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RN2W1P2L8D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-RN2W1P2L8D');
    </script>

</body>

</html>