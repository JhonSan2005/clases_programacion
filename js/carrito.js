document.addEventListener('DOMContentLoaded', function () {
  // Selección de elementos
  const quantityInputs = document.querySelectorAll('.product-quantity');
  const buttonIncreases = document.querySelectorAll('.btn-increase');
  const buttonDecreases = document.querySelectorAll('.btn-decrease');
  const deleteButtons = document.querySelectorAll('.btn-delete');
  const subtotalElement = document.getElementById('subtotal');
  const totalElement = document.getElementById('total');
  const couponInput = document.getElementById('coupon-code');
  const applyCouponButton = document.getElementById('apply-coupon');
  
  // Precios y otros datos
  const IVA_RATE = 0.16;
  
  function updateTotal() {
      let subtotal = 0;
      quantityInputs.forEach(input => {
          const card = input.closest('.card');
          const price = parseFloat(card.querySelector('.card-text small').textContent.replace('Precio: $', '').replace('.', '').replace(',', '.'));
          const quantity = parseInt(input.value);
          subtotal += price * quantity;
      });

      const iva = subtotal * IVA_RATE;
      const total = subtotal + iva;

      subtotalElement.textContent = `$${subtotal.toLocaleString()}`;
      totalElement.textContent = `$${total.toLocaleString()} (Incluye $${iva.toLocaleString()} IVA)`;
  }
  
  function handleQuantityChange(input, change) {
      let quantity = parseInt(input.value) + change;
      if (quantity < 1) quantity = 1; // La cantidad mínima es 1
      input.value = quantity;
      updateTotal();
  }
  
  // Incremento y decremento de cantidad
  buttonIncreases.forEach((button, index) => {
      button.addEventListener('click', () => {
          handleQuantityChange(quantityInputs[index], 1);
      });
  });
  
  buttonDecreases.forEach((button, index) => {
      button.addEventListener('click', () => {
          handleQuantityChange(quantityInputs[index], -1);
      });
  });
  
  // Eliminación del producto
  deleteButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
          const card = button.closest('.card');
          card.remove();
          updateTotal();
      });
  });
  
  // Aplicación de cupón
  applyCouponButton.addEventListener('click', () => {
      const couponCode = couponInput.value.trim();
      if (couponCode) {
          // Aquí podrías implementar la lógica para validar el cupón
          // Por ejemplo, aplicar un descuento fijo o porcentaje
          alert(`Cupón "${couponCode}" aplicado (simulación)`);
          // Ejemplo: aplicar un 10% de descuento
          let subtotal = parseFloat(subtotalElement.textContent.replace('$', '').replace('.', '').replace(',', '.'));
          const discount = subtotal * 0.10;
          subtotal -= discount;
          const iva = subtotal * IVA_RATE;
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
