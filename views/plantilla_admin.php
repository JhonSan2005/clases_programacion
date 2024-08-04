<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Repuestos JJ | <?php echo $title ?? ''; ?></title>
</head>
<body>

    <?php include_once __DIR__ . '../includes/header-admin.php'; ?>

    <main class="container mt-5" style="width: 100vw; height: 100vh;">
        <h2 class="text-body-secondary text-center"><?php echo $title; ?></h2>
        <?php echo $contenido; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
