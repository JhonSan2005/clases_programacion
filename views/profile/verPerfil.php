<div class="container d-flex flex-column justify-content-center mt-5 custom-container">
            <div class="bg-white shadow p-4">
                <div class="text-center mb-4">
                    <img class="img-thumbnail" src="/img/no_image.jpg" alt="Imagen Perfil" style="width: 250px; height: 250px;">
                </div>
                <form action="update-profile.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-medium text-body-secondary">C.C.</label>
                        <input type="text" class="form-control text-black-30" name="documento" value="<?php echo htmlspecialchars($profile['documento']); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label fw-medium text-body-secondary">Apellidos</label>
                        <input type="text" class="form-control text-black-30" name="nombre" value="<?php echo htmlspecialchars($profile['nombre']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium text-body-secondary">Correo</label>
                        <input type="email" class="form-control text-black-30" name="correo" value="<?php echo htmlspecialchars($profile['correo']); ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-warning w-100">Guardar Cambios</button>
                </form>
            </div>
        </div>