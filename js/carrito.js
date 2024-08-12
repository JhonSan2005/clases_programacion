"use strict";

document.addEventListener("DOMContentLoaded", () => {
  
  // variables
  const offCanvasCarrito = document.querySelector("#cart-items");
  const contenedorSeccionCarrito = document.querySelector("#container--carrito");
  const listaProductos = document.querySelector('#lista-productos');
  const totalesCarritoContainer = document.querySelector("#cart-totals");

  const contenedorResumenCompra = document.querySelector('.lista-resumen-compra');
  const formularioFormaPago = document.querySelector('.formulario--pago');

  let articulosCarrito = JSON.parse(localStorage.getItem('carrito')) ?? [];

  // Agregamos todas las funciones
  if(listaProductos) listaProductos.addEventListener('click', agregarAlCarrito);
  if(contenedorSeccionCarrito) contenedorSeccionCarrito.addEventListener('click', incrementarCantidadProducto);
  if(contenedorSeccionCarrito) contenedorSeccionCarrito.addEventListener('click', decrementarCantidadProducto);
  if(contenedorSeccionCarrito) contenedorSeccionCarrito.addEventListener('click', eliminarProducto);
  if(formularioFormaPago) formularioFormaPago.addEventListener('submit', procesarDatosPago);
  offCanvasCarrito.addEventListener('click', incrementarCantidadProducto);
  offCanvasCarrito.addEventListener('click', decrementarCantidadProducto);
  offCanvasCarrito.addEventListener('click', eliminarProducto);

  verificarStorage();

  function agregarAlCarrito(e) {
    e.preventDefault();

    if( e.target.classList.contains('add-to-cart') ) {
      const productoSeleccionado = e.target.parentElement.parentElement;

      const infoProducto = {
        id: productoSeleccionado.dataset.id,
        nombre: productoSeleccionado.querySelector('.card-title').textContent,
        precio: productoSeleccionado.querySelector('.card-price').textContent,
        cantidad: 1,
        maxCantidad: productoSeleccionado.querySelector('.card-stock').textContent,
        imagen: productoSeleccionado.querySelector('img').src
      }

      // Revisamos si ya existe un elemento el el carrito
      const existe = articulosCarrito.some( producto => producto?.id == infoProducto.id );

      if( existe ) {

        // Actualizamos la cantidad
        const productos = articulosCarrito.map( producto => {
          if( producto.id == infoProducto.id ) {
            if( producto.cantidad < producto.maxCantidad ) {
              producto.cantidad++;
            }
            return producto;
          } else {
            return producto;
          }
        } );

        articulosCarrito = [...productos];
      } else {
        // Agrega productos al array de carrito
        articulosCarrito = [...articulosCarrito, infoProducto];
      }
      
      // Guardamos la informacion en el localStorage
      localStorage.setItem('carrito', JSON.stringify(articulosCarrito));

      mostrarProductoEnCarrito();
    }
  }

  function mostrarProductoEnCarrito() {

    // limpiamos el HTML
    limpiarOffCanvasCarrito();

    articulosCarrito.forEach( producto => {
      const { id, nombre, precio, cantidad, imagen } = producto;

      const tarjetaProducto = document.createElement("li");
      tarjetaProducto.className = "list-group-item d-flex justify-content-evenly align-items-center cart-item";
      tarjetaProducto.dataset.id = id;
      tarjetaProducto.innerHTML = `
                      <div class="d-flex align-items-center">
                          <img src="${imagen}" alt="${nombre}" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                      </div>

                      <div>
                          <span class="cart-item-name fw-semibold">${nombre}</span>
                          <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-secondary btn-decrease">-</button>
                            <span class="cart-item-quantity">${cantidad}</span>
                            <button class="btn btn-sm btn-secondary btn-increase">+</button>
                            x <span class="cart-item-price">$${cantidad * precio}</span>
                          </div>
                      </div>
                      <button class="btn btn-danger btn-sm remove-item delete-product-in-cart">X</button>
                  `;

      offCanvasCarrito.appendChild(tarjetaProducto);
    } );

    totalOffCabvasCarrito(offCanvasCarrito);

  }

  function mostrarEnSeccionCarrito() {
    if( contenedorSeccionCarrito ) {

      // Limpiar el HTML
      limpiarContenedorSeccionCarrito();

      articulosCarrito.forEach( producto => {
        const { id, nombre, precio, cantidad, imagen } = producto;

        const divCarrito = document.createElement("div");
        divCarrito.className = "card mb-3";
        divCarrito.innerHTML = `
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="${imagen}" class="card-img" alt="Imagen del Producto">
                </div>
                <div class="col-md-8">
                    <div class="card-body" data-id="${id}">
                        <h5 class="card-title">${nombre}</h5>
                        <p class="card-text"><small class="text-muted">Precio: $${precio}</small></p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                            </div>
                            <input type="text" class="form-control product-quantity" value="${cantidad}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                            </div>
                        </div>
                        <button class="btn btn-outline-danger delete-product-in-cart">Eliminar</button>
                    </div>
                </div>
            </div>
        `;

        contenedorSeccionCarrito.append(divCarrito);
      } );

      totalesSeccionCarrito(totalesCarritoContainer);

    }
  }

  function incrementarCantidadProducto(e) {
    e.preventDefault();

    if( e.target.classList.contains('btn-increase') ) {
      const idProducto = e.target.parentElement.parentElement.parentElement.dataset.id;

      // Para actualizar las cantidades debemos primer averiguar en que posicion del array se encuentra
      const posicionProductoEnArray = articulosCarrito.findIndex( producto => producto.id == idProducto );

      // antes de modificar la cantidad debemos validar la cantidad maxima que podemos ingresar en el carrito
      if( articulosCarrito[posicionProductoEnArray].cantidad < articulosCarrito[posicionProductoEnArray].maxCantidad ) {
        // Accedemos al array de articulos carrito y en la posicion modificamos el objeto
        articulosCarrito[posicionProductoEnArray].cantidad = articulosCarrito[posicionProductoEnArray].cantidad + 1;

        // Guardamos denuevo el array en localStorage
        localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
  
        // volvemos a llamar la funcion de mostrar en carrito para renovar el HTML
        verificarStorage();
      }
    }
  }

  function decrementarCantidadProducto(e) {
    e.preventDefault();
    if( e.target.classList.contains('btn-decrease') ) {
      const idProducto = e.target.parentElement.parentElement.parentElement.dataset.id;

      // Para actualizar las cantidades debemos primer averiguar en que posicion del array se encuentra
      const posicionProductoEnArray = articulosCarrito.findIndex( producto => producto.id == idProducto );

      // antes de modificar la cantidad debemos validar la cantidad maxima que podemos ingresar en el carrito
      if( articulosCarrito[posicionProductoEnArray].cantidad > 1 ) {
        // Accedemos al array de articulos carrito y en la posicion modificamos el objeto
        articulosCarrito[posicionProductoEnArray].cantidad = articulosCarrito[posicionProductoEnArray].cantidad - 1;

        // Guardamos denuevo el array en localStorage
        localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
  
        // volvemos a llamar la funcion de mostrar en carrito para renovar el HTML
        verificarStorage();
      }
    }
  }

  function totalOffCabvasCarrito(e) {
    
    const divTotal = e.parentElement.querySelector('#total');

    let subTotal = 0;
    let total = 0;
    const iva = 0.19; // se representa asi porque javascript no lo deja escribir con el %

    // Procedemos a calcular el total del precio sin iva y con iva para saber cuanto dara al final
    // el precio parcial y total de la compra
    articulosCarrito.forEach( producto => {
      subTotal += parseInt(producto.precio) * parseInt(producto.cantidad);
    } )

    total = subTotal + (subTotal * iva );

    divTotal.textContent = `Total: $ ${total}`;

  }

  function totalesSeccionCarrito(e) {

    const divSubTotal = e.querySelector('#subtotal');
    const divTotal = e.querySelector('#total');

    let subTotal = 0;
    let total = 0;
    const iva = 0.19; // se representa asi porque javascript no lo deja escribir con el %

    // Procedemos a calcular el total del precio sin iva y con iva para saber cuanto dara al final
    // el precio parcial y total de la compra
    articulosCarrito.forEach( producto => {
      subTotal += parseInt(producto.precio) * parseInt(producto.cantidad);
    } )

    total = subTotal + (subTotal * iva );

    divSubTotal.textContent = `$ ${subTotal}`;
    divTotal.textContent = `$ ${total} (Incluye 19% IVA)`;

  }

  function eliminarProducto(e) {
    e.preventDefault();
    
    if( e.target.classList.contains('delete-product-in-cart') ) {
      const idProducto = e.target.parentElement.getAttribute('data-id');

      // Eliminar del array de productos en el carrito por el data-id
      articulosCarrito = articulosCarrito.filter( producto => producto.id !== idProducto );

      // Actualizamos el localStorage
      localStorage.setItem('carrito', JSON.stringify(articulosCarrito));

      // volvemos a llamar la funcion de mostrar en carrito para renovar el HTML
      verificarStorage();
    }
  }

  function procesarDatosPago(e) {
    e.preventDefault();

    const nombre = document.querySelector('#nombre').value
    const apellido = document.querySelector('#apellido').value;
    const correo = document.querySelector('#correo').value;
    const direccion = document.querySelector('#direccion').value;
    const pais = document.querySelector('#pais').value;
    const departamento = document.querySelector('#departamento').value;
    const municipio = document.querySelector('#municipio').value;

    const data = {
      nombre,
      apellido,
      correo,
      direccion,
      pais,
      departamento,
      municipio,
      lista_productos: JSON.stringify(articulosCarrito)
    }

    const formData = new FormData;

    for (const key in data) {
      formData.append(key, data[key]);
    }

    try {

      const venta = fetch('http://localhost:3000/api/venta', {
        method: 'POST',
        body: formData
      })
      .then( resp => resp.json() )
      .then( result => {
        alert(`${result?.msg}`);
        setTimeout(() => {
          localStorage.clear();
          verificarStorage();
          window.location.href = `${window.location.origin}/`;
        }, 1000)
      } );

    } catch(err) {
      alert(err);
    }

  }

  function mostrarResumenCompra() {
    if(contenedorResumenCompra) {

      // Limpiar el HTML Previo
      limpiarContenedorResumenCompras();
      
      articulosCarrito.forEach(producto => {
        const { nombre, precio, cantidad } = producto;

        const listaResumenCompra = document.createElement('li');
        listaResumenCompra.className = 'list-group-item d-flex justify-content-between';
        listaResumenCompra.innerHTML = `
            <span>${nombre} - ${cantidad}</span>
            <strong>$${precio * cantidad}</strong>
        `;
        contenedorResumenCompra.appendChild(listaResumenCompra);
      });

    }
  }

  function limpiarOffCanvasCarrito() {
    while( offCanvasCarrito.firstChild ) {
      offCanvasCarrito.removeChild(offCanvasCarrito.firstChild);
    }
  }

  function limpiarContenedorSeccionCarrito() {
    while( contenedorSeccionCarrito.firstChild ) {
      contenedorSeccionCarrito.removeChild(contenedorSeccionCarrito.firstChild);
    }
  }

  function limpiarContenedorResumenCompras() {
    while( contenedorResumenCompra.firstChild ) {
      contenedorResumenCompra.removeChild(contenedorResumenCompra.firstChild);
    }
  }

  function verificarStorage() {

      mostrarEnSeccionCarrito();
      mostrarProductoEnCarrito();
      mostrarResumenCompra();

    if( totalesCarritoContainer && articulosCarrito.length < 1 ) {
      const botonCompletarCompra = totalesCarritoContainer.parentElement.querySelector('.btn-complete-purchase');
      botonCompletarCompra.href = '';
      botonCompletarCompra.classList.add('disabled');
    }
  }

});
