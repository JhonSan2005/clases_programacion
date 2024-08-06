
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h4>Zona de coincidencia con el cliente</h4>
            <?php foreach ($products as $product): ?>
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
            <button class="btn btn-outline-primary">Seguir Comprando</button>
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
            <button class="btn btn-danger btn-block">Finalizar Compra</button>
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