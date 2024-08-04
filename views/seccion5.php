<?php
$seccion5 = "Recuperar Contraseña";
?>

<head>
    <title> <?php echo "$seccion5"; ?></title>
</head>
<div>
        <div style="text-align: center; margin-top: 20px;">
            <img src="../img/logol.png" alt="Logo" style="max-height: 180px; max-width: 300px;">
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: calc(100vh - 240px);">
    <div class="container">
        <img src="css/img/g.png" alt="Logo" class="logo">
        <h3>Hola, Ingresa tu Correo para Recuperar tu contraseña</h3>
        <form action="iniciarsesion.php" method="post">
            <div class="form-group">
                <input type="email" name="correo" placeholder="Correo electrónico" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Recuperar</button>
        </form>
    </div>
    </div>