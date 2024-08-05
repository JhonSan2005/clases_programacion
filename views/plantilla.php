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

    <!-- Contenedor del offcanvas -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Carrito de Compras</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul id="cart-items" class="list-group mb-3"></ul>
           <div id="cart-total">Total: $0.00</div>
<ul id="cart-items" class="list-group"></ul>

            <a href="#" class="btn btn-success w-100" id="checkout-btn">Continuar Compra</a>
        </div>
    </div>

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