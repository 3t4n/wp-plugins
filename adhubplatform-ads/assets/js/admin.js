(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Gestione del toggle degli annunci
        $('#enabled').on('change', function() {
            var $fields = $('.adhub-platform-settings textarea, .adhub-platform-settings select').not('#enabled');
            if ($(this).is(':checked')) {
                $fields.prop('disabled', false);
            } else {
                $fields.prop('disabled', true);
            }
        });
        
        // Evidenzia il campo textarea quando viene cliccato
        $('.adhub-platform-settings textarea').on('focus', function() {
            $(this).select();
        });
        
        // Inizializza lo stato dei campi al caricamento
        if (!$('#enabled').is(':checked')) {
            $('.adhub-platform-settings textarea, .adhub-platform-settings select').not('#enabled').prop('disabled', true);
        }
    });
})(jQuery);