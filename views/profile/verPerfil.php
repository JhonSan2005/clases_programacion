<div class="container d-flex flex-column justify-content-center mt-5 custom-container">
    <div class="bg-white rounded shadow p-4">
        <div class="text-center mb-4">
            <img id="profileImage" class="img-thumbnail" src="/img/no_image.jpg" alt="Imagen Perfil" style="width: 250px; height: 250px;">
        </div>
        <form>
            <div class="mb-3">
                <label class="form-label fw-medium text-body-secondary">C.C.</label>
                <input type="text" class="form-control text-black-30" name="documentoNuevo" value="<?php echo htmlspecialchars($_SESSION['documento']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label fw-medium text-body-secondary">Apellidos</label>
                <input type="text" class="form-control text-black-30" name="nombre" value="<?php echo htmlspecialchars($_SESSION['nombre']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-medium text-body-secondary">Correo</label>
                <input type="email" class="form-control text-black-30" name="correo" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>" disabled>
            </div>
            <a class="btn btn-primary w-100" href="/edit-profile">Editar Perfil</a>
        </form>
    </div>
</div>