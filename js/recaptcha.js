
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitButton = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function(event) {
        const recaptchaResponse = grecaptcha.getResponse();

        if (recaptchaResponse.length === 0) {
            event.preventDefault(); // Detiene el envío del formulario
            alert('Por favor, completa el reCAPTCHA.');
        }
    });
});

