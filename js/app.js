document.addEventListener("keyup", e => {
    if (e.target.matches("#buscador")) {
        const searchText = e.target.value.toLowerCase().trim();
        const productos = document.querySelectorAll(".producto");

        productos.forEach(producto => {
            const nombreProducto = producto.querySelector(".articulo").textContent.toLowerCase();
            if (nombreProducto.includes(searchText)) {
                producto.style.display = "block";  // Mostrar el producto que coincide
                producto.classList.remove("filtro"); // Remover la clase de filtro del producto
            } else {
                producto.style.display = "none"; // Ocultar el producto que no coincide
                producto.classList.add("filtro"); // Agregar la clase de filtro al producto
            }
        });
    }
});