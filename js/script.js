$(document).ready(function() {
    $('.category_item').click(function(event) {
        event.preventDefault();
        
        var category = $(this).attr('category');
        
        if (category == 'all') {
            $('.card').show(); // Muestra todos los productos
        } else {
            $('.card').hide(); // Oculta todos los productos
            $('.card.' + category).show(); // Muestra solo los productos de la categoría seleccionada
        }
    });
});
