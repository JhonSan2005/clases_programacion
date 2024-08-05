<div class="container d-flex flex-column justify-content-center mt-5 custom-container">
    <div class="bg-white shadow p-4">
        <div class="text-center mb-4">
            <img id="profileImage" class="img-thumbnail" src="/img/no_image.jpg" alt="Imagen Perfil" style="width: 250px; height: 250px;">
        </div>
        <form action="/profile" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="documento" class="form-label fw-medium text-body-secondary">C.C.</label>
            <input type="text" class="form-control text-black-30" name="documento" id="documento" value="<?php echo htmlspecialchars($_SESSION['documento']); ?>">
        </div>
            <div class="mb-3">
                <label for="nombre" class="form-label fw-medium text-body-secondary">Apellidos</label>
                <input type="text" class="form-control text-black-30" name="nombre" id="nombre" value="<?php echo htmlspecialchars($_SESSION['nombre']); ?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label fw-medium text-body-secondary">Correo</label>
                <input type="email" class="form-control text-black-30" name="correo" id="correo" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-medium text-body-secondary">Contraseña</label>
                <input type="password" class="form-control text-black-30" id="password" name="password" placeholder="Dejar vacío si no desea cambiarla">
            </div>
            <div class="mb-3">
                <label for="profileImageInput" class="form-label fw-medium text-body-secondary">Seleccionar Imagen</label>
                <input type="file" class="form-control text-black-30" id="profileImageInput" name="imagen_url">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>
<script>
    document.getElementById('profileImageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
