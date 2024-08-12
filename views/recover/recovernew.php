<?php include_once __DIR__ . '/../includes/alertaTemplate.php'; ?>

<?php if(isset($existeToken) && !empty($existeToken)): ?>
<form method="POST">
    <div class="input-group mb-2">
        <input type="password" class="form-control" name="nueva_password" placeholder="Nueva Contraseña" required>
    </div>
    
    <div class="input-group mb-2">
        <input type="password" class="form-control" name="confirmar_password" placeholder="Confirmar Nueva Contraseña" required>
    </div>
    
    <button type="submit" class="btn btn-danger w-100">Actualizar Contraseña</button>
</form>
<?php endif; ?>
