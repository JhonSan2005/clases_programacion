<!-- Categorías de Productos -->
<div class="container my-3">
        <div class="d-flex align-items-center">
            <span class="me-2">Filtrar por:</span>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorías
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/products?category=all" category="all">Todo</a></li>
                    <li><a class="dropdown-item" href="/products?category=1" category="1">Aceites</a></li>
                    <li><a class="dropdown-item" href="/products?category=2" category="2">Repuestos</a></li>
                    <li><a class="dropdown-item" href="/products?category=3" category="3">Llantas</a></li>
                </ul>
            </div>
        </div>
    </div>

<!-- Productos -->
<div class="container d-flex gap-5 justify-content-center flex-wrap">
    <?php if (isset($productos) && $productos): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="card card--product border">
                <img src="../img/repuestos.png" class="card-img-top" alt="Imagen del Producto">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre_producto']); ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button class="btn btn-primary add-to-cart" 
        data-id="<?php echo htmlspecialchars($producto['id_producto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
        data-image="img/repuestos.png">Agregar al Carrito
</button>

                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="alert alert-light" role="alert">No hay datos para mostrar</p>
    <?php endif; ?>
</div>

<!-- Script JavaScript -->
<script src="js/main.js"></script>
