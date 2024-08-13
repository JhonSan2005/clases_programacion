
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="col-md-8 overflow-y-auto overflow-x-hidden" id="container--carrito" style="max-height: 430px; width: 100%;">
                <h4>Zona de coincidencia con el cliente</h4>

            </div>
            <a href="/products" class="btn btn-outline-primary mt-3">Seguir Comprando</a>
        </div>

        <div class="col-md-4">
            <h4>Totales del Carrito</h4>
            <ul class="list-group mb-3" id="cart-totals">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong id="subtotal">$0</strong>
                </li>
                <li class="list-group-item d-flex gap-2">
                    <span>Envío</span>
                    <b>Recogida en tienda (Sólo repuestos)</b>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong id="total">$0 (Incluye 19% IVA)</strong>
                </li>
            </ul>

            <a href="/formaPago" class="btn btn-danger btn-complete-purchase">Finalizar Compra</a>

            <!-- <div class="mt-3">
                <h5>Cupon</h5>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Código de cupón" id="coupon-code">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="apply-coupon">Aplicar cupón</button>
                    </div>
                </div>
            </div> -->
            <!-- <div class="mt-3 text-center">
                <img src="https://via.placeholder.com/300x50" alt="Métodos de pago">
            </div> -->
        </div>
    </div>
</div>
<script>
    function checkLogin() {
        // Aquí se hace una solicitud AJAX para verificar si el usuario está logueado
        fetch('/check_login.php')
            .then(response => response.json())
            .then(data => {
                if (data.loggedIn) {
                    // Si el usuario está logueado, redirige a la página de pago
                    window.location.href = '/formaPago';
                } else {
                    // Si no está logueado, redirige al índice
                    window.location.href = '/index';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Opcionalmente, puedes manejar errores aquí
            });
    }
    </script>