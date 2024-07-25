// Función para obtener parámetros de la URL
function obtenerParametroUrl(nombre) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(nombre);
}

// Mostrar SweetAlert si el usuario está bloqueado temporalmente
document.addEventListener('DOMContentLoaded', function() {
    const error = obtenerParametroUrl('error');
    const tiempoRestante = obtenerParametroUrl('time');

    if (error === 'blocked') {
        Swal.fire({
            icon: 'error',
            title: 'Cuenta bloqueada temporalmente',
            html: `Tu cuenta está bloqueada temporalmente.<br>Por favor espera ${tiempoRestante} segundos para intentar de nuevo.`
        });
    
}
}
);


