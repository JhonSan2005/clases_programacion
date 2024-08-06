document.addEventListener('DOMContentLoaded', function () {
    // Selección de elementos
    const quantityInput = document.getElementById('product-quantity');
    const buttonIncrease = document.getElementById('button-increase');
    const buttonDecrease = document.getElementById('button-decrease');
    const deleteButton = document.getElementById('delete-button');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    const couponInput = document.getElementById('coupon-code');
    const applyCouponButton = document.getElementById('apply-coupon');
    
    // Precios y otros datos
    const productPrice = 134235;
    let quantity = parseInt(quantityInput.value);
    
    function updateTotal() {
        const subtotal = productPrice * quantity;
        const iva = subtotal * 0.16; // Supongamos que el IVA es el 16%
        const total = subtotal + iva;
        
        subtotalElement.textContent = `$${subtotal.toLocaleString()}`;
        totalElement.textContent = `$${total.toLocaleString()} (Incluye $${iva.toLocaleString()} IVA)`;
    }
    
    function handleQuantityChange(change) {
        quantity += change;
        if (quantity < 1) quantity = 1; // La cantidad mínima es 1
        quantityInput.value = quantity;
        updateTotal();
    }
    
    // Incremento y decremento de cantidad
    buttonIncrease.addEventListener('click', function () {
        handleQuantityChange(1);
    });
    
    buttonDecrease.addEventListener('click', function () {
        handleQuantityChange(-1);
    });
    
    // Eliminación del producto
    deleteButton.addEventListener('click', function () {
        // Puedes redirigir o eliminar el producto del DOM según sea necesario
        alert('Producto eliminado del carrito');
        // Ejemplo: eliminar la tarjeta del producto
        document.querySelector('.card.mb-3').remove();
        updateTotal();
    });
    
    // Aplicación de cupón
    applyCouponButton.addEventListener('click', function () {
        const couponCode = couponInput.value.trim();
        if (couponCode) {
            // Aquí podrías implementar la lógica para validar el cupón
            // Por ejemplo, aplicar un descuento fijo o porcentaje
            alert(`Cupón "${couponCode}" aplicado (simulación)`);
            // Ejemplo: aplicar un 10% de descuento
            const discount = productPrice * quantity * 0.10;
            const subtotal = productPrice * quantity - discount;
            const iva = subtotal * 0.16;
            const total = subtotal + iva;
            
            subtotalElement.textContent = `$${subtotal.toLocaleString()}`;
            totalElement.textContent = `$${total.toLocaleString()} (Incluye $${iva.toLocaleString()} IVA)`;
        } else {
            alert('Ingrese un código de cupón');
        }
    });
    
    // Inicializar total
    updateTotal();
});