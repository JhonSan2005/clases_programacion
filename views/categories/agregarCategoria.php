<div class="container my-3">

    <?php include_once __DIR__ . "/../../views/includes/alertaTemplate.php"; ?>

    <div class="p-3 shadow-sm mx-auto container-agregar-productos bg-white">
        <form action="/admin/categories" method="POST">

            <div class="form-group mb-3">
                <label for="id_categoria" class="form-label">Id</label>
                <input type="number" id="id_categoria" name="id_categoria" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group mb-3">
                <label for="nombre_categoria" class="form-label">Categoría</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Agregar</button>
            </div>
        </form>
    </div>
</div>
