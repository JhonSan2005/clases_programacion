<?php
// Verifica si el token está presente en la URL y lo almacena en una variable segura
$token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
?>

<form action="/recover/recovernew" method="POST">
    <input type="hidden" name="token" value="<?php echo $token; ?>" required>
    
    <div class="input-group mb-2">
        <input type="password" class="form-control" name="nueva_password" placeholder="Nueva Contraseña" required>
    </div>
    
    <div class="input-group mb-2">
        <input type="password" class="form-control" name="confirmar_password" placeholder="Confirmar Nueva Contraseña" required>
    </div>
    
    <button type="submit" class="btn btn-danger w-100">Actualizar Contraseña</button>
</form>

