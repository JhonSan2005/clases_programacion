<div class="container d-flex justify-content-center mt-5">

    <div class="d-flex gap-5 flex-column flex-md-row bg-white shadow p-4">

        <div class="flex-1 d-flex justidy-content-center align-items-center">
            <div>
                <img class="img-thumbnail" src="/img/no_image.jpg" alt="Imagen Perfil" style="width: 250px; height: 250px;">
            </div>
        </div>
        
        <div class="flex-1 d-flex flex-column">

            <div class="mb-3">
                <label class="form-label fw-medium text-body-secondary">C.C.</label>
                <input type="text" class="form-control text-black-50" placeholder="N/A" value="<?php echo $profile['documento'] ?? ''; ?>" disabled>
            </div>
            
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label fw-medium text-body-secondary">Apellidos</label>
                <input type="text" class="form-control text-black-50" placeholder="N/A" value="<?php echo $profile['nombre'] ?? ''; ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label fw-medium text-body-secondary">Correo</label>
                <input type="text" class="form-control text-black-50" placeholder="N/A" value="<?php echo $profile['correo'] ?? ''; ?>" disabled>
            </div>

            <div class="mb-3 w-100">
                <a href="/edit-profile" class="btn btn-warning w-100">Editar</a>
            </div>


        </div>
    </div>

</div>