<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Repuestos JJ | <?php echo $title ?? ''; ?></title>
</head>

<body>

    <?php include_once __DIR__ . '../includes/header.php'; ?>

    <main class="container main-content">
        <?php echo $contenido; ?>
    </main>

    <!-- Contenedor del offcanvas -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Carrito de Compras</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul id="cart-items" class="list-group mb-3"></ul>
            <div class="d-flex justify-content-between mb-3">
                <h5>Total:</h5>
                <h5 id="cart-total">$0.00</h5>
            </div>
            <a href="compra.php" class="btn btn-success w-100" id="checkout-btn">Continuar Compra</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <?php include_once __DIR__ . '../includes/footer.php'; ?>

</body>

</html>