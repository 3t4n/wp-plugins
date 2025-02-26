jQuery(document).ready(function($) {
    function toggleOptionFields() {
        var selectedOption = $('#seo_optimizer_attribute_option').val();
        
        // Mostrar u ocultar el contenedor de plantilla personalizada
        if (selectedOption === 'custom_template') {
            $('#seo_optimizer_custom_template_container').slideDown();
        } else {
            $('#seo_optimizer_custom_template_container').slideUp();
        }
        
        // Mostrar u ocultar el contenedor de filtros de nombres de archivo
        if (selectedOption === 'filename') {
            $('#seo_optimizer_filename_filters_container').slideDown();
        } else {
            $('#seo_optimizer_filename_filters_container').slideUp();
        }
    }
    
    // Ejecutar la función al cargar la página
    toggleOptionFields();
    
    // Ejecutar la función cada vez que cambie la opción seleccionada
    $('#seo_optimizer_attribute_option').on('change', toggleOptionFields);
});
