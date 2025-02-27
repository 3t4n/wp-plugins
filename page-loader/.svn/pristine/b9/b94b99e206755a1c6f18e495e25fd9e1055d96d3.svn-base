jQuery(document).ready(function($) {
    function updatePreview() {
        var loadericon = $('select[name=loader_icon]').val();
        $('#pl-preview-box div').attr('class', loadericon);
        var backgroundcolor = $('input[name=background_color]').val();
        $('#pl-preview-box').css('background', backgroundcolor);
        var iconcolor = $('input[name=icon_color]').val();

        if (loadericon == "plcircle" || loadericon == "plfan") {
            $('#pl-preview-box div').css('border-color', iconcolor);
            $('#pl-preview-box div').css('background', 'transparent');
        } else if (loadericon == "plcircle2") {
            $('#pl-preview-box div').css('border-color', 'rgba(0, 0, 0, 0.1)');
            $('#pl-preview-box div').css('border-top-color', iconcolor);
            $('#pl-preview-box div').css('background', 'transparent');
        } else {
            $('#pl-preview-box div').css('background', iconcolor);
            $('#pl-preview-box div').css('border-color', 'transparent');
        }
    }

    // Trigger the updatePreview function whenever a dropdown or color picker changes
    $('select[name=loader_icon]').on('change', function() {
        updatePreview();
    });

    // Initialize color pickers with wpColorPicker
    $('.pl-color-picker').wpColorPicker({
        change: function(event, ui) {
            updatePreview();
        }
    });
    
    // Initial preview update
    updatePreview();
});