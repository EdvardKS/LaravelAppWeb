document.addEventListener('DOMContentLoaded', function() {
    // Obtén los elementos del formulario
    const isOpenSelect = document.getElementById('is_open');
    const startTimeInput = document.getElementById('start_time');
    const endTimeInput = document.getElementById('end_time');

    // Función para mostrar u ocultar los campos de horario
    function toggleTimeInputs() {
        if (isOpenSelect.value == '0') {
            startTimeInput.parentElement.style.display = 'block';
            endTimeInput.parentElement.style.display = 'block';
            startTimeInput.setAttribute('required', 'required');
            endTimeInput.setAttribute('required', 'required');
        } else {
            startTimeInput.parentElement.style.display = 'none';
            endTimeInput.parentElement.style.display = 'none';
            startTimeInput.removeAttribute('required');
            endTimeInput.removeAttribute('required');
        }
    }

    // Ejecuta la función toggleTimeInputs al cambiar el selector "Tipo"
    isOpenSelect.addEventListener('change', toggleTimeInputs);

    // Ejecuta la función toggleTimeInputs al cargar la página
    toggleTimeInputs();
});