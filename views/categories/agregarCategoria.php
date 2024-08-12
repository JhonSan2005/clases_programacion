<div class="container my-3">

    <?php include_once __DIR__ . "/../../views/includes/alertaTemplate.php"; ?>

    <div class="p-3 shadow-sm mx-auto container-agregar-productos bg-white">
        <form action="/admin/agregarCategoria" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="id_categoria" class="form-label">ID Categoría</label>
                <input type="text" id="id_categoria" name="id_categoria" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group mb-3">
                <label for="nombre_categoria" class="form-label">Nombre Categoría</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group mb-3">
                <label for="categoria_existente" class="form-label">Categoría Existente</label>
                <select id="categoria_existente" name="categoria_existente" class="form-control">
                    <option value="">-- Selecciona una categoría --</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Agregar</button>
                <button type="reset" class="btn btn-warning">Vaciar</button>
            </div>
        </form>
    </div>
</div>
