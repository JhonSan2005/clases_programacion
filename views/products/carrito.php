<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="col-md-8 overflow-y-auto overflow-x-hidden" style="max-height: 430px; width: 100%;">
                <h4>Zona de coincidencia con el cliente</h4>
                <?php foreach ($products as $product) : ?>
                    <div class="card mb-3" data-id="<?php echo $product['id']; ?>">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo $product['imagen']; ?>" class="card-img" alt="Imagen del Producto">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['nombre']; ?></h5>
                                    <p class="card-text"><small class="text-muted">Precio: $<?php echo number_format($product['precio'], 0, ',', '.'); ?></small></p>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                                        </div>
                                        <input type="text" class="form-control product-quantity" value="<?php echo $product['cantidad']; ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-danger btn-delete">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="btn btn-outline-primary mt-3">Seguir Comprando</button>
        </div>
        <div class="col-md-4">
            <h4>Totales del Carrito</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong id="subtotal">$0</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Envío</span>
                    <strong>Recogida en tienda (Sólo repuestos)</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong id="total">$0 (Incluye $0 IVA)</strong>
                </li>
            </ul>
            <a href="/formaPago" class="btn btn-danger btn-block">Finalizar Compra</a>

            <div class="mt-3">
                <h5>Cupon</h5>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Código de cupón" id="coupon-code">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="apply-coupon">Aplicar cupón</button>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-center">
                <img src="https://via.placeholder.com/300x50" alt="Métodos de pago">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/js/carrito.js"></script>

<style>
    /* General Styles */

    .container {
        margin-top: 20px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background-color: #ffffff;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .card-img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover;
        height: 150px;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff;
    }

    .card-text {
        font-size: 0.9rem;
        color: #666;
    }

    .input-group {
        margin: 10px 0;
    }

    .input-group .form-control {
        border-radius: 4px;
        border-color: #ced4da;
        font-size: 0.9rem;
    }

    .input-group-prepend .btn,
    .input-group-append .btn {
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #ffffff;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #ffffff;
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: #ffffff;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-block {
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .list-group-item {
        border: none;
        padding: 10px;
        font-size: 0.9rem;
        background-color: #ffffff;
        border-radius: 8px;
        margin-bottom: 8px;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    #subtotal,
    #total {
        font-weight: bold;
        font-size: 1rem;
    }

    #coupon-code {
        border-radius: 4px;
        font-size: 0.9rem;
    }

    #apply-coupon {
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .text-center img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-img {
            height: 120px;
        }

        .col-md-8,
        .col-md-4 {
            width: 100%;
            padding: 0;
        }
    }
</style>