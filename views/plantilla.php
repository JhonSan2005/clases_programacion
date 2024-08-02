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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php include_once __DIR__ . '../includes/footer.php'; ?>

</body>
</html>
