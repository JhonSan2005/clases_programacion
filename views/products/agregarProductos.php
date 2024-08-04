

    <div class="container2">
    <h1 class="form-title">Agregar Productos</h1>
    <?php include_once __DIR__ . "/../../views/includes/alertaTemplate.php"; ?>
    
      <form action="/agregarProductos" method="POST">
        <div class="form-group">
            <label for="id_producto" class="form-label">ID Producto</label>
            <input type="text" id="id_producto" name="id_producto" class="form-input" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="nombre_producto" class="form-label">Nombre Producto</label>
            <input type="text" id="nombre_producto" name="nombre_producto" class="form-input" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="product_price" class="form-label">Precio</label>
            <input type="number" id="product_price" name="product_price" class="form-input" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="product_tax" class="form-label">Impuesto</label>
            <input type="number" id="product_tax" name="product_tax" class="form-input" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="product_stock" class="form-label">Stock</label>
            <input type="number" id="product_stock" name="product_stock" class="form-input" autocomplete="off" required>
        </div>
                <div class="form-group">
                 <label for="id_categoria" class="form-label">Categoría</label>
                  <select id="id_categoria" name="id_categoria" class="form-input" required>
                     <option value="">Selecciona una categoría</option>
                     <option value="1">Aceites</option>
                     <option value="2">Repuestos</option>
                     <option value="3">Llantas</option>
    </select>
</div>
        <div class="form-group">
            <label for="product_description" class="form-label">Descripción</label>
            <textarea id="product_description" name="product_description" class="form-input" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="product_image" class="form-label">Imagen</label>
            <label for="product_image" class="file-label">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span class="mt-2 text-base leading-normal text-blue-500 font-bold">Selecciona un archivo</span>
                <input type="file" id="product_image" name="product_image" class="hidden" accept=".png, .jpg" required>
            </label>
            <p class="file-info">Tipos de archivo aceptados: Solo .png y .jpg</p>
        </div>
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Agregar</button>
            <button type="reset" class="btn btn-warning">Vaciar</button>
        </div>
    </form>
</div>
</div>
