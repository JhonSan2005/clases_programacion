<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="#">Perfil</a>
        <a class="nav-link active ms-0" href="profile/contraseña">Seguridad</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-3"> <!-- Reducir el tamaño de la columna -->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Foto de Perfil</div>
                <div class="card-body text-center p-2"> <!-- Reducir el padding del contenedor -->
                    <?php
                        $foto_de_perfil = $profile['foto_de_perfil'] ?? 'http://bootdey.com/img/Content/avatar/avatar1.png';
                    ?>
                    <img id="profileImage" class="img-account-profile mb-2 img-thumbnail"
                         style="width: 100px; height: 100px;" <!-- Ajustar el tamaño de la imagen -->
                         <?php echo htmlspecialchars($foto_de_perfil); ?>
                         
                    <div class="small font-italic text-muted mb-3">JPG o PNG máximo 5 MB</div>
                    <form id="formSubirImagen" action="/profile/verPerfi" method="POST" enctype="multipart/form-data">
                        <label for="foto_de_perfil" class="btn btn-primary btn-sm"> <!-- Reducir el tamaño del botón -->
                            <i class='bx bx-upload'></i> Seleccionar archivo
                        </label><br><br>
                        <input type="file" id="foto_de_perfil" name="foto_de_perfil" accept="image/*" required style="display:none;">
                        <button class="btn btn-primary btn-sm" type="submit">Subir Nueva imagen</button> <!-- Reducir el tamaño del botón -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-9"> <!-- Aumentar el tamaño de la columna de detalles -->
            <div class="card mb-4">
                <div class="card-header">Detalles de la cuenta</div>
                <div class="card-body">
                <form action="/profile/verPerfil" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="small mb-1" for="documento">Documento</label>
                        <input class="form-control" id="documento" name="documento" type="text" 
                            placeholder="Ingresa tu cédula" value="<?php echo htmlspecialchars($documento); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" type="text" 
                            placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($nombre); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="correo">Correo</label>
                        <input class="form-control" id="correo" name="correo" type="text" 
                            placeholder="Ingresa tu correo" value="<?php echo htmlspecialchars($correo); ?>">
                    </div>
                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto_de_perfil').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
